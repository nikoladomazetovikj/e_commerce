const path = 'http://127.0.0.1:8000/images/';
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
        console.log(data.data[i])
        card += `<div class="card col-6">
                            <img id="best-sales-img" src="${path + data.data[i].image}" class="card-img-top" alt="...">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <h5 class="card-title">${data.data[i].name}</h5>
                                        <p class="card-text">${data.data[i].category}</p>
                                        <a href="products/${data.data[i].id}" class="btn btn-success">Buy
                                            Now</a>
                                    </div>
                                    <div class="col">
                                        <h4 class="text-end text-success">${data.data[i].price} $</h4>
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
            $(".card").hide();
            products(data);
        },
        error: function (error) {
            console.log("error: ", error);
            alert(error.responseJSON.message);
        },
    });
}
