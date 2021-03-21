@extends('site.layouts.default')

@section('content')

    <div class="container mx-auto py-16">
    <div class="py-16 px-4 bg-gray-100 min-h-screen">
        <h1 class="text-3xl text-black font-light uppercase text-center">Your Cart</h1>
        <div class="w-1/2 mx-auto py-12 mt-8 px-12 bg-white shadow-lg rounded-lg">
            <table class="w-full">
                <thead class="border-b-2 ">
                    <th  class="text-sm pb-4 text-gray-400 uppercase font-normal text-left">Photo</th>
                    <th class="text-sm pb-4 text-gray-400 uppercase font-normal text-left">Type</th>
                    <th class="text-sm pb-4 text-gray-400 uppercase font-normal text-left">Size</th>
                    <th class="text-sm pb-4 text-gray-400  uppercase font-normal text-left">Price</th>
                    <th class="text-sm pb-4 text-gray-400  uppercase font-normal text-left"></th>
                    
                </thead>

                <tbody>
                @foreach($cart->PhotoVariations as $variation)
                    <tr class="border-b-2">
                        <td class="py-4 flex items-center">
                            <figure class="w-24 h-24">
                                <img class="w-full h-full object-cover" src="{{ asset('storage/' .$variation->photo->file_path )}}" alt="">
                            </figure>
                            <h4 class="text-md text-gray-800 font-light ml-4">#{{$variation->photo->idx}}</h4>
                        </td>
                        <td class="py-4 text-gray-400 font-light">
                            {{ $variation->image_type }}
                        </td>
                        <td class="py-4 text-gray-400 font-light">
                            {{ $variation->dimension }}
                        </td>
                        <td class="py-4  text-gray-600 font-light">
                             {{ $variation->price / 100 }}
                        </td>
                        <td class="py-4 font-light">
                        <form action="/cart/item/{{ $variation->id }}" method="post">
                            @method('delete')
                            @csrf
                            <button class="px-2 py-1 bg-red-500 text-white rounded-sm">X</button>
                        </form>
                        </td>
                    </tr>
                    @endforeach
                        <!-- <tr class="border-b-2">
                        <td class="py-4 flex items-center">
                            <figure class="w-24 h-24">
                                <img class="w-full h-full object-cover" src="https://images.pexels.com/photos/1975781/pexels-photo-1975781.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500" alt="">
                            </figure>
                            <h4 class="text-md text-gray-800 ml-4 font-light">#TAS1212</h4>
                        </td>
                        <td class="py-4 text-gray-400 font-light">
                            Web
                        </td>
                        <td class="py-4 text-gray-400 font-light">
                            1200 x 1600
                        </td>
                        <td class="py-4 font-light text-gray-600">
                             RS. 1600
                        </td>
                        <td class="py-4">
                            <button class="px-2 py-1 bg-red-500 text-white rounded-sm">X</button>
                        </td>
                    </tr> -->

                    <tr>
                        <td  class="py-6"></td>
                        <td  class="py-6"></td>
                        <td  class="py-6 text-center font-light">Total</td>
                        <td  class="py-6 text-blue-600 font-light text-xl">Rs. {{ $cart->totalAmount() / 100 }}</td>
                    </tr>
                </tbody>

            </table>
        </div>

        <div class="w-1/2 mx-auto pt-8 flex justify-between">
            <a href="/" class="py-2 px-6 bg-blue-500 text-white font-light">Continue Shopping</a>
            <a href="/checkout" class="py-2 px-6 bg-purple-500 text-white font-light">Checkout</a>
        </div>
    </div>
    </div>

@endsection