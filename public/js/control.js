function nextStep(stepNumber) {

    if (stepNumber == 2) {
        if ($('#projectName').val() != "") {

            $('.log-panel span.log-pf').remove();
            $('.log-panel span.log-pn').remove();

            if ($('#builder').find('#input_projectName').val() && $('#input_projectName').val() != $('#projectName').val()) {
                $('#input_projectName').remove();
                $('#builder').append("<input id='input_projectName' type='hidden' name='projectName' value='" + $('#projectName').val() + "'>");
                $('.log-panel').append("<span class='dark log-pn'> <b class='info'> Proje Adı Değişti </b> &nbsp;" + $('#projectName').val() + " </span>");

            } else {
                $('#input_projectName').remove();
                $('.log-panel').append("<span class='dark log-pn'> <b class='success'> Proje Adı </b> &nbsp;" + $('#projectName').val() + " </span>");
                $('#builder').append("<input id='input_projectName' type='hidden' name='projectName' value='" + $('#projectName').val() + "'>");
            }

            if ($('#builder').find('#input_projectFolder').val() && $('#input_projectFolder').val() != $('#folderSelected').val()) {
                $('#input_projectFolder').remove();
                $('#builder').append("<input id='input_projectFolder' type='hidden' name='projectFolder' value='" + $('#folderSelected').val() + "'>");
                $('.log-panel').append("<span class='dark log-pf'> <b class='info'> Klasör yapısı değişti </b> &nbsp;" + $('#folderSelected').val() + " </span>");

            } else {
                $('#input_projectFolder').remove();
                $('.log-panel').append("<span class='dark log-pf'> <b class='success'> Klasör Yapısı </b> &nbsp;" + $('#folderSelected').val() + " </span>");
                $('#builder').append("<input id='input_projectFolder' type='hidden' name='projectFolder' value='" + $('#folderSelected').val() + "'>");
            }

            $('#step' + stepNumber).fadeOut("fast", function () {
                $('#step' + stepNumber).removeClass("active");
                stepNumber++;
                $('#step' + stepNumber).addClass("active").fadeIn();
            });


        } else {
            $('#projectName').focus();
        }
    } else {

        $('#step' + stepNumber).fadeOut("fast", function () {
            $('#step' + stepNumber).removeClass("active");
            stepNumber++;
            $('#step' + stepNumber).addClass("active").fadeIn();
        });
    }

}

function backStep(stepNumber) {
    $('#step' + stepNumber).fadeOut("fast", function () {
        $('#step' + stepNumber).removeClass("active");
        stepNumber--;
        $('#step' + stepNumber).addClass("active").fadeIn();
    });
}


function buildcheckbox(checkBoxId, type, value, name) {

    let checkBox = document.getElementById(checkBoxId);
    if (checkBox.checked == true) {
        $('.mtda' + checkBoxId).remove();
        $('#builder').append("<input id='input_" + checkBoxId + "' type='hidden' name='" + type + "[" + checkBoxId + "]' value='" + value + "'>");
        $('.log-panel').append("<span class='dark log-hdak mtak" + checkBoxId + "'> <b class='success'> AKTİF </b> &nbsp;" + name + " </span>");
    } else {
        $('#input_' + checkBoxId).remove();
        $('.mtak' + checkBoxId).remove();
        $('.log-panel').append("<span class='dark log-hdda mtda" + checkBoxId + "'> <b class='danger'> DEAKTİF </b> " + name + " </span>");
    }
}


function builder() {

    $.ajax({
        type: "POST",
        url: 'builder.php',
        data: $("#builder").serialize(), // formdaki tüm bilgileri gönder.
        beforeSend: function () {
            $('.step-content').fadeOut();
            $('.buildSuccess').fadeIn();
        },
        success: function (data) {

            $('buildSuccess a').attr("href", data)

        },
        complete: function () {

        },
    });




    // $("#builder").submit();
}