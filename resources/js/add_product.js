const addProduct = $("#product-add").validate({
    rules: {
        name: {
            required: true
        },
        desc: {
            required: true
        },
        category: {
            required: true
        },
        subcategory: {
            required: true
        },
        address: {
            required: true
        },
        price: {
            required: true
        },
        dateFrom: {
            required: true,
            min: "2019-01-01",
            max: "2029-01-01",
        },
        dateTo: {
            required: true,
            min: "2019-01-01",
            max: "2029-01-01",
        },
    },
    messages: {
        name: {
            required: "Wprowadź nazwę"
        },
        desc: {
            required: "Wprowadź opis"
        },
        category: {
            required: "Wybierz kategorię"
        },
        subcategory: {
            required: "Wybierz podkategorię"
        },
        address: {
            required: "Wybierz adres"
        },
        price: {
            required: "Wprowadź cenę"
        },
        dateFrom: {
            required: "Wprowadź datę",
            min: "Wprowadź datę późniejszą niż 01-01-2019",
            max: "Wprowadź datę wcześniejszą niż 01-01-2029",
        },
        dateTo: {
            required: "Wprowadź datę",
            min: "Wprowadź datę późniejszą niż 01-01-2019",
            max: "Wprowadź datę wcześniejszą niż 01-01-2029",
        }
    },
    errorElement: "span",
    errorClass: "error",
    errorPlacement: function (error, element) {
        error.insertBefore(element);
    }
});

$(".step1").click(function () {
    if (addProduct.form()) {
        $(".tab-panel").hide();
        $("#step2").fadeIn(1000);
        $('.progressbar-dots').removeClass('active');
        $('.progressbar-dots:nth-child(2)').addClass('active');
    }
});

$(".step2").click(function () {
    if (addProduct.form()) {
        $(".tab-panel").hide();
        $("#step3").fadeIn(1000);
        $('.progressbar-dots').removeClass('active');
        $('.progressbar-dots:nth-child(3)').addClass('active');
    }
});

$(".step2back").click(function () {
    $(".tab-panel").hide();
    $("#step1").fadeIn(1000);
    $('.progressbar-dots').removeClass('active');
    $('.progressbar-dots:nth-child(1)').addClass('active');
});

$(".step3back").click(function () {
    $(".tab-panel").hide();
    $("#step2").fadeIn(1000);
    $('.progressbar-dots').removeClass('active');
    $('.progressbar-dots:nth-child(2)').addClass('active');
});

$(".main-checkbox :checkbox").click(function () {
    let filterValue = this.value;
    if (this.checked) $(filterValue).show();
    else $(filterValue).hide();
});

$("#category").click(function () {
    let el = document.getElementById('category');
    el.onchange = function () {
        let category = $('#category :selected').attr('class');
        $('.cat').hide();
        $('.subcat').show();
        $('.cat' + category).show();
    }
});

$("#premium").on('change', function () {
    if ($(this).is(':checked')) {
        $(this).attr('value', '1');
    } else {
        $(this).attr('value', '0');
    }
});

$("#visible").on('change', function () {
    if ($(this).is(':checked')) {
        $(this).attr('value', '1');
    } else {
        $(this).attr('value', '0');
    }
});

