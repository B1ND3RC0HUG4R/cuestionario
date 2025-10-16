const token = "Cg_siNSdL5Ks9rJqo0TY3hSQgpVbZkLQhC_F42E9DG9n2cRDsyfv0VHtr-_YXG8-PXRTnxs1IFx9kYelxHSSLg";

function changeSection(idUnlook, idLook, buttonLook, buttonUnlook){
    $("#"+idUnlook).addClass('show active');
    $("#"+idLook).removeClass('show active');
    $("#"+buttonLook).prop('disabled',true);
    $("#"+buttonLook).removeClass('active');
    $("#"+buttonUnlook).addClass('active');
    document.body.scrollTop = 0;
    document.documentElement.scrollTop = 0;
}

function showCarrusel(){
    $('#modalCarrusel').modal('show');
};

function hideCarrusel(){
    $('#modalCarrusel').modal('hide')
};

function saveValidateForm(){
    const nom = document.getElementById("basic-icon-default-fullname").value;
    const app = document.getElementById("basic-icon-default-lastname").value;
    const correo = document.getElementById("basic-icon-default-email").value;
    const fecha = document.getElementById("html5-date-input").value;
    const achi = document.getElementById("basic-icon-default-achi").value;
    const theme = document.getElementById("favorite-theme").value;
    const materials = document.getElementById("basic-icon-default-materials").value;
    const parents = document.getElementById("basic-icon-default-parents").value;
    const careerspecific = document.getElementById("basic-icon-default-careerspecific").value;
    const companys = document.getElementById("basic-icon-default-companys").value;
    const link = document.getElementById("basic-icon-default-link").value;

    const expr = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;

    if (!nom || !app || !correo || !fecha || !achi || !theme || !materials || !parents || !careerspecific || !companys || !link) {
        alertify.notify('Upss!!, Los campos con * no pueden quedar vacíos.', 'error', 3, null);
        return false;
    }

    if (!expr.test(correo)) {
        alertify.notify('El correo '+correo+' no cumple con el formato requerido.', 'error', 3, null);
        return false;
    }

    const urlPattern = /^https:\/\/www\.16personalities\.com\/(es\/)?resultados\/[a-zA-Z0-9\-]+\/[a-z]\/[a-z0-9]+$/;

    if (!urlPattern.test(link)) {
        alertify.notify('La URL ingresada no parece ser un resultado válido de 16Personalities.', 'error', 3, null);
        return false;
    }


    const json_data = {
        nombre: nom,
        apellidos: app,
        correo: correo,
        fecha: fecha,
        number: generarPhoneNumber(),
        additional_data: {
            logro: achi,
            metas: materials,
            tema: theme,
            tema_why: document.getElementById("basic-icon-default-whypasion").value,
            actividades: document.getElementById("basic-icon-default-activities").value,
            materias: materials,
            materias_why: document.getElementById("basic-icon-default-whymaterials").value,
            admirar: document.getElementById("basic-icon-default-admire").value,
            padres: parents,
            padres_why: document.getElementById("basic-icon-default-whyparents").value,
            carrera: careerspecific,
            carrera_why: document.getElementById("basic-icon-default-whycareerspecific").value,
            empresas: companys,
            url: link
        }
    };

    // Ejecutar el scraper
    fetch('run_scraper.php', {
        method: 'POST',
        headers: {
        'Content-Type': 'application/x-www-form-urlencoded'
        },
        body: new URLSearchParams({ link: link })
    })
    .then(async response => {
        try {
            response.json().then(data => {
                if (!response.ok) {
                    alertify.notify('Upss!!, Ocurrio un error por favor llena la información nuevamente.', 'error', 3, null);
                    return;
                }
                json_data.additional_data.resultados = data.rasgos;
                (async () => {
                    const cuenta = await crearCuenta(json_data, token);
                    if (cuenta) {
                        enviarResultadosAPIEscala(json_data, token, cuenta.id);
                    }
                })();
            });
        } catch (err) {
            alertify.notify('Upss!!, Ocurrio un error por favor llena la información nuevamente.', 'error', 3, null);
            console.error("Respuesta no es JSON válido:", text);
        }
    })
    .catch(error => {
        alertify.notify('Upss!!, Error del sistema.', 'error', 3, null);
        console.error("Error al ejecutar scraper:", error);
    });

    changeSection('navs-justified-messages', 'navs-justified-home', 'button-justified-home', 'button-justified-messages');

    return true
}

async function crearCuenta(json_payload, token) {
  const cuenta = {
    annualRevenue: 0,
    assignedTo: "unassigned",
    custom: {
      cf_name_text: json_payload.nombre + " " + json_payload.apellidos
    },
    email: json_payload.correo,
    industryTypeCode: "education",
    name: json_payload.nombre + " " + json_payload.apellidos,
    numberOfEmployees: 0,
    phone: json_payload.number,
    website: json_payload.additional_data.url
  };

  try {
    const response = await fetch('https://public-api.escala.com/v1/crm/accounts', {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json',
        'x-api-key': token
      },
      body: JSON.stringify(cuenta)
    });

    const text = await response.text();

    if (!response.ok) {
      console.error("❌ Error HTTP:", response.status);
      console.error("❌ Detalles del error:", text);
      return null;
    }

    const data = JSON.parse(text);
    console.log("✅ Cuenta creada en Escala");
    return data;

  } catch (error) {
    console.error("❌ Error al enviar a Escala:", error.message);
    return null;
  }
}

function enviarResultadosAPIEscala(rasgos, token, accountId) {
    //console.log("🆔 ID de cuenta creada:", accountId);
    const resumen = Array.isArray(rasgos.additional_data.resultados)
        ? rasgos.additional_data.resultados.map(r => `${r.categoria}: ${r.porcentaje} ${r.tipo}`).join(', ')
        : '';

    const contacto = {
        accountId: accountId,
        assignedTo: "unassigned",
        company: {
            name: "Información cuestionario la guia de la vida",
            email: rasgos.correo,
            phoneNumber: rasgos.number,
            website: rasgos.additional_data.url
        },
        contacted: true,
        custom: {
            contact_fecha_nacimiento_jyto_date: rasgos.fecha,
            contact_logros_lmxy_text: rasgos.additional_data.logro,
            cf_contact_materia_o_actividades_rmez_text: rasgos.additional_data.materias,
            cf_contact_porque_materia_o_actividades_zzoe_text: rasgos.additional_data.materias_why,
            cf_contact_actividades_vobw_text: rasgos.additional_data.actividades,
            cf_contact_materio_o_tema_emjw_text: rasgos.additional_data.tema,
            contact_porque_materia_o_tema_fopq_text: rasgos.additional_data.tema_why,
            cf_contact_admiras_fyay_text: rasgos.additional_data.admirar,
            cf_contact_papas_snaj_text: rasgos.additional_data.padres,
            cf_contact_porque_papas_olvk_text: rasgos.additional_data.padres_why,
            cf_contact_tu_carrera_ioea_text: rasgos.additional_data.carrera,
            cf_contact_porque_tu_lovh_text: rasgos.additional_data.carrera_why,
            cf_contact_empresas_kkhn_text: rasgos.additional_data.empresas
        },
        marketable: true,
        notes: resumen,
        personal: {
            firstName: rasgos.nombre,
            lastName: rasgos.apellidos,
            email: rasgos.correo,
            phoneNumber: rasgos.number,
            city: "Any",
            country: "Any"
        },
        priority: 0,
        source: "referrer",
        status: "lead",
        triggerWorkflow: false
    };

    //console.log("Payload:", contacto);

    fetch('https://public-api.escala.com/v1/crm/contacts', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'x-api-key': token
        },
        body: JSON.stringify(contacto)
    })
    .then(async response => {
    const text = await response.text();
    if (!response.ok) {
        console.error("❌ Error HTTP:", response.status);
        console.error("❌ Detalles del error:", text);
        throw new Error(`HTTP ${response.status}`);
    }
    const data = JSON.parse(text);
    console.log("✅ Información de cuestionario enviada a Escala");
    })
    .catch(error => {
        console.error("❌ Error al enviar a Escala:", error.message);
    });
};

function generarPhoneNumber() {
  let numero = '';
  for (let i = 0; i < 10; i++) {
    numero += Math.floor(Math.random() * 10);
  }
  return numero;
}

/*
function nextStep(idUnlook, idLook, newprogress){
    $("#"+idUnlook).addClass('show active');
    $("#"+idLook).removeClass('show active');
    document.body.scrollTop = 0;
    document.documentElement.scrollTop = 0;
    $('#progressbar').attr('aria-valuenow', newprogress).css('width', newprogress+'%');

    return true
}

function collectorQuizTwo(){
    var radios_uqmvl5bttb = $("input:radio[name=radios_uqmvl5bttb]:checked").val();
    var radios_hazut4by9m = $("input:radio[name=radios_hazut4by9m]:checked").val();
    var radios_s91m28qnot = $("input:radio[name=radios_s91m28qnot]:checked").val();
    var radios_pr93m5m3fe = $("input:radio[name=radios_pr93m5m3fe]:checked").val();
    var radios_kyl3fnolt8 = $("input:radio[name=radios_kyl3fnolt8]:checked").val();
    var radios_caxtvamg4k = $("input:radio[name=radios_caxtvamg4k]:checked").val();

    var radios_ahoonzyx9b = $("input:radio[name=radios_ahoonzyx9b]:checked").val();
    var radios_nbnd10xhaq = $("input:radio[name=radios_nbnd10xhaq]:checked").val();
    var radios_ogke6rqocu = $("input:radio[name=radios_ogke6rqocu]:checked").val();
    var radios_un4dnr1b5l = $("input:radio[name=radios_un4dnr1b5l]:checked").val();
    var radios_xow71x47n0 = $("input:radio[name=radios_xow71x47n0]:checked").val();
    var radios_idghievgxl = $("input:radio[name=radios_idghievgxl]:checked").val();

    var radios_bg1t6yd49y = $("input:radio[name=radios_bg1t6yd49y]:checked").val();
    var radios_ljupuu4lyk = $("input:radio[name=radios_ljupuu4lyk]:checked").val();
    var radios_w2opmucv4c = $("input:radio[name=radios_w2opmucv4c]:checked").val();
    var radios_n8j7ec48me = $("input:radio[name=radios_n8j7ec48me]:checked").val();
    var radios_r0kpoty8pk = $("input:radio[name=radios_r0kpoty8pk]:checked").val();
    var radios_pelx1wio7v = $("input:radio[name=radios_pelx1wio7v]:checked").val();

    var radios_pm0hlmwlad = $("input:radio[name=radios_pm0hlmwlad]:checked").val();
    var radios_xvbltvaw7i = $("input:radio[name=radios_xvbltvaw7i]:checked").val();
    var radios_hiq202o28o = $("input:radio[name=radios_hiq202o28o]:checked").val();
    var radios_ua2ugcphn4 = $("input:radio[name=radios_ua2ugcphn4]:checked").val();
    var radios_le6x4lny5j = $("input:radio[name=radios_le6x4lny5j]:checked").val();
    var radios_qtnqe9068p = $("input:radio[name=radios_qtnqe9068p]:checked").val();

    var radios_o92yuv1ls0 = $("input:radio[name=radios_o92yuv1ls0]:checked").val();
    var radios_h9bnmix57o = $("input:radio[name=radios_h9bnmix57o]:checked").val();
    var radios_v6aovv3gro = $("input:radio[name=radios_v6aovv3gro]:checked").val();
    var radios_ujykax65gk = $("input:radio[name=radios_ujykax65gk]:checked").val();
    var radios_ofbjbamfq9 = $("input:radio[name=radios_ofbjbamfq9]:checked").val();
    var radios_wgr3twi2cy = $("input:radio[name=radios_wgr3twi2cy]:checked").val();

    var radios_edfj4lttps = $("input:radio[name=radios_edfj4lttps]:checked").val();
    var radios_amnrkh1per = $("input:radio[name=radios_amnrkh1per]:checked").val();
    var radios_fnms9kxffi = $("input:radio[name=radios_fnms9kxffi]:checked").val();
    var radios_owfoqw6uzd = $("input:radio[name=radios_owfoqw6uzd]:checked").val();
    var radios_fltoux8ezg = $("input:radio[name=radios_fltoux8ezg]:checked").val();
    var radios_gk3e5rtpoj = $("input:radio[name=radios_gk3e5rtpoj]:checked").val();

    var radios_w1yf9861vf = $("input:radio[name=radios_w1yf9861vf]:checked").val();
    var radios_xjhv1mf7x3 = $("input:radio[name=radios_xjhv1mf7x3]:checked").val();
    var radios_uigx5ffnud = $("input:radio[name=radios_uigx5ffnud]:checked").val();
    var radios_ayd7s01mb8 = $("input:radio[name=radios_ayd7s01mb8]:checked").val();
    var radios_r7aolvat4l = $("input:radio[name=radios_r7aolvat4l]:checked").val();
    var radios_otl11qwsdb = $("input:radio[name=radios_otl11qwsdb]:checked").val();

    var radios_ure745o5tn = $("input:radio[name=radios_ure745o5tn]:checked").val();
    var radios_d1uu33ns2g = $("input:radio[name=radios_d1uu33ns2g]:checked").val();
    var radios_pg52brlwbo = $("input:radio[name=radios_pg52brlwbo]:checked").val();
    var radios_jze8dnnkw2 = $("input:radio[name=radios_jze8dnnkw2]:checked").val();
    var radios_crchw01p6i = $("input:radio[name=radios_crchw01p6i]:checked").val();
    var radios_f5b2nh8bjg = $("input:radio[name=radios_f5b2nh8bjg]:checked").val();

    var radios_bf1n8o6wx2 = $("input:radio[name=radios_bf1n8o6wx2]:checked").val();
    var radios_wbbb3ujrvb = $("input:radio[name=radios_wbbb3ujrvb]:checked").val();
    var radios_cjguzbwmnl = $("input:radio[name=radios_cjguzbwmnl]:checked").val();
    var radios_l8cb45in1v = $("input:radio[name=radios_l8cb45in1v]:checked").val();
    var radios_hserxc63fb = $("input:radio[name=radios_hserxc63fb]:checked").val();
    var radios_bzxaisbj47 = $("input:radio[name=radios_bzxaisbj47]:checked").val();

    var radios_cpmq9mx86z = $("input:radio[name=radios_cpmq9mx86z]:checked").val();
    var radios_v1ayl9hr85 = $("input:radio[name=radios_v1ayl9hr85]:checked").val();
    var radios_j5v8hozq4y = $("input:radio[name=radios_j5v8hozq4y]:checked").val();
    var radios_i4oq3mitbj = $("input:radio[name=radios_i4oq3mitbj]:checked").val();
    var radios_e2yplyzbei = $("input:radio[name=radios_e2yplyzbei]:checked").val();
    var radios_oimnaonsws = $("input:radio[name=radios_oimnaonsws]:checked").val();

    jsonQuiz= {
        "quiz": [
            {
                "radios_uqmvl5bttb": radios_uqmvl5bttb,
                "radios_hazut4by9m": radios_hazut4by9m,
                "radios_s91m28qnot": radios_s91m28qnot,
                "radios_pr93m5m3fe": radios_pr93m5m3fe,
                "radios_kyl3fnolt8": radios_kyl3fnolt8,
                "radios_caxtvamg4k": radios_caxtvamg4k
            },
            {
                "radios_ahoonzyx9b": radios_ahoonzyx9b,
                "radios_nbnd10xhaq": radios_nbnd10xhaq,
                "radios_ogke6rqocu": radios_ogke6rqocu,
                "radios_un4dnr1b5l": radios_un4dnr1b5l,
                "radios_xow71x47n0": radios_xow71x47n0,
                "radios_idghievgxl": radios_idghievgxl
            },
            {
                "radios_bg1t6yd49y": radios_bg1t6yd49y,
                "radios_ljupuu4lyk": radios_ljupuu4lyk,
                "radios_w2opmucv4c": radios_w2opmucv4c,
                "radios_n8j7ec48me": radios_n8j7ec48me,
                "radios_r0kpoty8pk": radios_r0kpoty8pk,
                "radios_pelx1wio7v": radios_pelx1wio7v
            },
            {
                "radios_pm0hlmwlad": radios_pm0hlmwlad,
                "radios_xvbltvaw7i": radios_xvbltvaw7i,
                "radios_hiq202o28o": radios_hiq202o28o,
                "radios_ua2ugcphn4": radios_ua2ugcphn4,
                "radios_le6x4lny5j": radios_le6x4lny5j,
                "radios_qtnqe9068p": radios_qtnqe9068p
            },
            {
                "radios_o92yuv1ls0": radios_o92yuv1ls0,
                "radios_h9bnmix57o": radios_h9bnmix57o,
                "radios_v6aovv3gro": radios_v6aovv3gro,
                "radios_ujykax65gk": radios_ujykax65gk,
                "radios_ofbjbamfq9": radios_ofbjbamfq9,
                "radios_wgr3twi2cy": radios_wgr3twi2cy
            },
            {
                "radios_edfj4lttps": radios_edfj4lttps,
                "radios_amnrkh1per": radios_amnrkh1per,
                "radios_fnms9kxffi": radios_fnms9kxffi,
                "radios_owfoqw6uzd": radios_owfoqw6uzd,
                "radios_fltoux8ezg": radios_fltoux8ezg,
                "radios_gk3e5rtpoj": radios_gk3e5rtpoj
            },
            {
                "radios_w1yf9861vf": radios_w1yf9861vf,
                "radios_xjhv1mf7x3": radios_xjhv1mf7x3,
                "radios_uigx5ffnud": radios_uigx5ffnud,
                "radios_ayd7s01mb8": radios_ayd7s01mb8,
                "radios_r7aolvat4l": radios_r7aolvat4l,
                "radios_otl11qwsdb": radios_otl11qwsdb
            },
            {
                "radios_ure745o5tn": radios_ure745o5tn,
                "radios_d1uu33ns2g": radios_d1uu33ns2g,
                "radios_pg52brlwbo": radios_pg52brlwbo,
                "radios_jze8dnnkw2": radios_jze8dnnkw2,
                "radios_crchw01p6i": radios_crchw01p6i,
                "radios_f5b2nh8bjg": radios_f5b2nh8bjg
            },
            {
                "radios_bf1n8o6wx2": radios_bf1n8o6wx2,
                "radios_wbbb3ujrvb": radios_wbbb3ujrvb,
                "radios_cjguzbwmnl": radios_cjguzbwmnl,
                "radios_l8cb45in1v": radios_l8cb45in1v,
                "radios_hserxc63fb": radios_hserxc63fb,
                "radios_bzxaisbj47": radios_bzxaisbj47
            },
            {
                "radios_cpmq9mx86z": radios_cpmq9mx86z,
                "radios_v1ayl9hr85": radios_v1ayl9hr85,
                "radios_j5v8hozq4y": radios_j5v8hozq4y,
                "radios_i4oq3mitbj": radios_i4oq3mitbj,
                "radios_e2yplyzbei": radios_e2yplyzbei,
                "radios_oimnaonsws": radios_oimnaonsws
            }
        ]
    }

    console.log(jsonQuiz)
    /*var data = jsonQuiz;
    $.ajax({
        url : 'https://www.evstest.com/G3v1LastVersion/portal/portal_action.php',
        data : data,
        method : 'post',
        dataType : 'json',
        success : function(response){
            console.log(response);
        },
        error: function(error){
            console.log(error);
        }
    });

    changeSection('navs-justified-messages', 'navs-justified-profile', 'button-justified-profile', 'button-justified-messages');
}*/