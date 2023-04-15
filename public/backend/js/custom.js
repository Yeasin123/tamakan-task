"use strict";



/*****************************************************
  ==========Bootstrap Notify start==========
  ******************************************************/
function bootnotify(message, title, type) {
    var content = {};

    content.message = message;
    content.title = title;
    content.icon = "fa fa-bell";

    $.notify(content, {
        type: type,
        placement: {
            from: "top",
            align: "right",
        },
        showProgressbar: true,
        time: 1000,
        allow_dismiss: true,
        delay: 4000,
    });
}
/*****************************************************
  ==========Bootstrap Notify end==========  
  ******************************************************/

$(function ($) {
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });

    /* ***************************************************************
  ==========disabling default behave of form submits start==========
  *****************************************************************/
    $("#ajaxEditForm").attr("onsubmit", "return false");
    $("#ajaxForm").attr("onsubmit", "return false");
    /* *************************************************************
  ==========disabling default behave of form submits end==========
  ***************************************************************/

 

    /* ***************************************************
  ==========Bootstrap Notify start==========
  ******************************************************/
    function bootnotify(message, title, type) {
        var content = {};

        content.message = message;
        content.title = title;
        content.icon = "fa fa-bell";

        $.notify(content, {
            type: type,
            placement: {
                from: "top",
                align: "right",
            },
            showProgressbar: true,
            time: 1000,
            allow_dismiss: true,
            delay: 4000,
        });
    }
    /* ***************************************************
  ==========Bootstrap Notify end==========
  ******************************************************/

    /* ***************************************************
  ==========Form Submit with AJAX Request Start==========
  ******************************************************/
    $(".submitBtn").on("click", function (e) {
        $(e.target).attr("disabled", true);
        $(".request-loader").addClass("show");

        let ajaxForm = document.getElementById("ajaxForm");
        let fd = new FormData(ajaxForm);
        let url = $("#ajaxForm").attr("action");
        let method = $("#ajaxForm").attr("method");

        if ($("#ajaxForm .summernote").length > 0) {
            $("#ajaxForm .summernote").each(function (i) {
                let content = $(this).summernote("isEmpty")
                    ? ""
                    : $(this).summernote("code");
                fd.delete($(this).attr("name"));
                fd.append($(this).attr("name"), content);
            });
        }

        $.ajax({
            url: url,
            method: method,
            data: fd,
            contentType: false,
            processData: false,
            success: function (data) {
                $(e.target).attr("disabled", false);
                $(".request-loader").removeClass("show");

                $(".em").each(function () {
                    $(this).html("");
                });
                if (data == "success") {
                    location.reload();
                }
                // if error occurs
                else if (typeof data.error != "undefined") {
                    for (let x in data) {
                        if (x == "error") {
                            continue;
                        }
                        document.getElementById("err" + x).innerHTML =
                            data[x][0];
                    }
                } else if (data?.errors?.error) {
                    const errors = data?.errors;
                    Object.keys(errors).map(function (key) {
                        if (key !== "error")
                            document.getElementById("err" + key).innerHTML =
                                errors[key][0];
                    });
                }
            },
            error: function (error) {
                $(".em").each(function () {
                    $(this).html("");
                });
                for (let x in error.responseJSON.errors) {
                  console.log(error.responseJSON.errors);
                    document.getElementById("err" + x).innerHTML =
                        error.responseJSON.errors[x][0];
                }
                $(".request-loader").removeClass("show");
                $(e.target).attr("disabled", false);
                if (error?.responseJSON?.exception) {
                    bootnotify(
                        error?.responseJSON?.exception,
                        "Warning",
                        "warning"
                    );
                }
            },
        });
    });



    /* ***************************************************
  ==========Form Prepopulate After Clicking Edit Button Start==========
  ******************************************************/
    $(".editBtn").on("click", function () {
        let datas = $(this).data();
        console.log(datas);
        delete datas["toggle"];
        for (let x in datas) {
            if ($("#in_" + x).hasClass("summernote")) {
                $("#in_" + x).summernote("code", datas[x]);
            } else if ($("#in_" + x).data("role") == "tagsinput") {
                if (datas[x].length > 0) {
                    let arr = datas[x].split(" ");
                    for (let i = 0; i < arr.length; i++) {
                        $("#in_" + x).tagsinput("add", arr[i]);
                    }
                } else {
                    $("#in_" + x).tagsinput("removeAll");
                }
            } else if ($("input[name='" + x + "']").attr("type") == "radio") {
                $("input[name='" + x + "']").each(function (i) {
                    if ($(this).val() == datas[x]) {
                        $(this).prop("checked", true);
                    }
                });
            } else if ($("#in_" + x).hasClass("select2")) {
                $("#in_" + x).val(datas[x]);
                $("#in_" + x).trigger("change");
            } else {
                $("#in_" + x).val(datas[x]);
                $(".brand-img").attr("src", datas["brand_img"]);
                $(".gallery-img").attr("src", datas["gallery_img"]);
            }
        }

        // focus & blur colorpicker inputs
        setTimeout(() => {
            $(".jscolor").each(function () {
                $(this).focus();
                $(this).blur();
            });
        }, 300);
    });

    
    $("#updateBtn").on("click", function (e) {
        $(".request-loader").addClass("show");
        if ($(".edit-iconpicker-component").length > 0) {
            $("#editInputIcon").val(
                $(".edit-iconpicker-component").find("i").attr("class")
            );
        }
        let ajaxEditForm = document.getElementById("ajaxEditForm");
        let fd = new FormData(ajaxEditForm);
        let url = $("#ajaxEditForm").attr("action");
        let method = $("#ajaxEditForm").attr("method");

        if ($("#ajaxEditForm .summernote").length > 0) {
            $("#ajaxEditForm .summernote").each(function (i) {
                let content = $(this).summernote("isEmpty")
                    ? ""
                    : $(this).summernote("code");
                fd.delete($(this).attr("name"));
                fd.append($(this).attr("name"), content);
            });
        }

        $.ajax({
            url: url,
            method: method,
            data: fd,
            contentType: false,
            processData: false,
            success: function (data) {
                $(".request-loader").removeClass("show");
                $(".em").each(function () {
                    $(this).html("");
                });
                if (data == "success") {
                    location.reload();
                }
                // if error occurs
                else if (typeof data.error != "undefined") {
                    for (let x in data) {
                        if (x == "error") {
                            console.log("imran");
                            continue;
                        }
                        console.log("yeasin");
                        document.getElementById("eerr" + x).innerHTML =
                            data[x][0];
                    }
                }
            },
            error: function (error) {
                $(".em").each(function () {
                    $(this).html("");
                });
                for (let x in error.responseJSON.errors) {
                    document.getElementById("editErr_" + x).innerHTML =
                        error.responseJSON.errors[x][0];
                }
                $(".request-loader").removeClass("show");
                $(e.target).attr("disabled", false);
                if (error?.responseJSON?.exception) {
                    bootnotify(
                        error?.responseJSON?.exception,
                        "Warning",
                        "warning"
                    );
                }
            },
        });
    });

  

    /* ***************************************************
  ==========Delete Using AJAX Request Start==========
  ******************************************************/
    $(".deletebtn").on("click", function (e) {
        e.preventDefault();
        $(".request-loader").addClass("show");

        swal({
            title: "Are you sure?",
            text: "You won't be able to revert this!",
            type: "warning",
            buttons: {
                confirm: {
                    text: "Yes, delete it",
                    className: "btn btn-success",
                },
                cancel: {
                    visible: true,
                    className: "btn btn-danger",
                },
            },
        }).then((Delete) => {
            if (Delete) {
                $(this).parent(".deleteform").trigger("submit");
            } else {
                swal.close();
                $(".request-loader").removeClass("show");
            }
        });
    });
    /* ***************************************************
  ==========Delete Using AJAX Request End==========
  ******************************************************/


   
});

