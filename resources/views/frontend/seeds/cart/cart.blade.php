@extends('frontend.layouts.master')

@section('content')
    <div class="container-fluid my-5">
        <div class="container table-responsive">
            <div class="row">
               <div class="mx-auto ">
                   <table id="cart" class="table table-hover ">
                       <thead>
                       <tr>
                           <th >Product</th>
                           <th>Price</th>
                           <th style="width: 10%">Quantity</th>
                           <th class="text-center">Subtotal</th>
                           <th></th>
                       </tr>
                       </thead>
                       <tbody>
                       @php $total = 0 @endphp
                       @if(session('cart'))
                           @foreach(session('cart') as $id => $details)
                               @php $total += $details['price'] * $details['quantity'] @endphp
                               <tr data-id="{{ $id }}">
                                   <td data-th="Product">
                                       <div class="row">
                                           <div class="col-sm-3 hidden-xs"><img src="{{ asset('images/' . $details['image']) }}"
                                                                                width="80"
                                                                                height="80"
                                                                                class="img-thumbnail"/></div>
                                           <div class="col-sm-9">
                                               <h4 >{{ $details['name'] }}</h4>
                                           </div>
                                       </div>
                                   </td>
                                   <td data-th="Price">${{ $details['price'] }}</td>
                                   <td data-th="Quantity">
                                       <input type="number" value="{{ $details['quantity'] }}" class="form-control quantity cart_update" min="1" />
                                   </td>
                                   <td data-th="Subtotal" class="text-center">${{ $details['price'] * $details['quantity'] }}</td>
                                   <td class="actions" data-th="">
                                       <button class="btn btn-danger btn-sm cart_remove"><i class="fa fa-trash-o"></i> Delete</button>
                                   </td>
                               </tr>
                           @endforeach
                       @endif
                       </tbody>
                       <tfoot>
                       <tr>
                           <td  class="text-right"><h3><strong>Total ${{ $total }}</strong></h3></td>
                       </tr>
                       <tr>
                           <td  class="text-right">
                               <a href="{{ url('/') }}" class="btn btn-danger"> <i class="fa fa-arrow-left"></i> Continue Shopping</a>
                               <button class="btn btn-success"><i class="fa fa-money"></i> Checkout</button>
                           </td>
                       </tr>
                       </tfoot>
                   </table>
               </div>
            </div>
        </div>
    </div>
@endsection


@section('js')
    <script type="text/javascript">

        $(".cart_update").change(function (e) {
            e.preventDefault();

            var ele = $(this);

            $.ajax({
                url: '{{ route('update_cart') }}',
                method: "patch",
                data: {
                    _token: '{{ csrf_token() }}',
                    id: ele.parents("tr").attr("data-id"),
                    quantity: ele.parents("tr").find(".quantity").val()
                },
                success: function (response) {
                    window.location.reload();
                }
            });
        });

        $(".cart_remove").click(function (e) {
            e.preventDefault();

            var ele = $(this);

            Swal.fire({
                title: 'Are you sure?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete product!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: '{{ route('remove_from_cart') }}',
                        method: "DELETE",
                        data: {
                            _token: '{{ csrf_token() }}',
                            id: ele.parents("tr").attr("data-id")
                        },
                        success: function (response) {
                            setTimeout(1000);
                            Swal.fire(
                                'Deleted!',
                                'Your product has been deleted.',
                                'success'
                            )
                            window.location.reload();
                        }
                    });

                }
            })

        });

    </script>
@endsection
