const path = window.location.protocol + '//' + window.location.hostname + ':' + window.location.port + '/images/';

$(function () {

    $("#all").prop("checked", true);
    var value = $("input[name='category']:checked").val();

    fetchProducts(value);

    $("input[name = 'category']").on("change", function () {
        value = $("input[name='category']:checked").val();
        fetchProducts(value);
    });

});

function products(data) {
    let card = ``;
    for (let i = 0; i < data.data.length; i++) {

        card += `<div class="col-lg-4 col-md-6 cards my-2">
                    <div class="card shadow h-100" >
                            <img src="${path + data.data[i].image}" class="card-img-top-custom" alt="...">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-8">
                                        <p class="card-title">${data.data[i].name}</p>
                                        <p class="card-text">${data.data[i].category}</p>
                                        <a href="products/${data.data[i].id}" class="btn btn-success">Buy
                                            Now</a>
                                    </div>
                                    <div class="col-4">
                                    ${data.data[i].price_with_sale != null ?
            `<p class="text-end text-decoration-line-through" style="color: red !important;">${data.data[i].price} $</p>
              <p class="text-end " style="color: lightgreen !important;">${data.data[i].price_with_sale} $</p>`
             : `<p class="text-end " style="color: lightgreen !important;">${data.data[i].price} $</p>`
        }

                                    </div>
                                </div>
                            </div>
                        </div>
                </div>`
        }

        $("#products").append(card);

}



function fetchProducts(value) {
    $("#pagination").twbsPagination("destroy");

    $.ajax({
        url: `/api/seeds?category=${value}`,
        method: "GET",
        cache: false,
        async: true,
        success: function (data) {
            var totalPages = data.meta.last_page;
            if (totalPages == 1) {
                let page = 1;
                paginate(value, page);
            }
            $("#pagination").twbsPagination({
                totalPages: totalPages,
                visiblePages: 3,
                next: "Next",
                prev: "Prev",
                onPageClick: function (event, page) {
                    paginate(value, page);
                },
            });
        },
        error: function (error) {
            console.log("error: ", error);
            alert(error.responseJSON.message);
        },
    });
}

function paginate(value, page) {
    $.ajax({
        url: `/api/seeds?category=${value}&page=` + page,
        method: "GET",
        cache: false,
        async: true,
        success: function (data) {
            $(".cards").hide();
            products(data);
        },
        error: function (error) {
            console.log("error: ", error);
            alert(error.responseJSON.message);
        },
    });
}
