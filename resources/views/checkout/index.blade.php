<x-app-layout>
   <x-slot name="title">
      Checkout
   </x-slot>

   <section class="checkout py-8">
      <div class="container mx-auto">
         <h2 class="text-2xl text-white font-bold mb-4">Checkout</h2>
         <div class="bg-white p-4 rounded-lg shadow-md">
            <h3 class="text-xl text-black font-bold mb-4">Rincian Pesanan</h3>
            <table class="w-full mb-4 text-black">
               <thead>
                  <tr>
                     <th class="text-left">Produk</th>
                     <th class="text-left">Jumlah</th>
                     <th class="text-left">Harga</th>
                     <th class="text-left">Total</th>
                  </tr>
               </thead>
               <tbody>
                  @foreach ($cartItems as $item)
                     <tr>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->quantity }}</td>
                        <td>{{ number_format($item->price, 2) }}</td>
                        <td>{{ number_format($item->price * $item->quantity, 2) }}</td>
                     </tr>
                  @endforeach
               </tbody>
            </table>
            <div class="text-right mb-4">
               <h3 class="text-xl font-bold">Total: {{ number_format($totalPrice, 2) }}</h3>
            </div>
            <form action="{{ route('checkout.store') }}" method="POST">
               @csrf
               <div class="mb-4">
                  <label for="address" class="block text-sm font-medium text-gray-700">Alamat Pengiriman</label>
                  <input type="text" name="address" id="address"
                     class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
               </div>
               <div class="mb-4">
                  <label for="payment_method" class="block text-sm font-medium text-gray-700">Metode Pembayaran</label>
                  <select name="payment_method" id="payment_method"
                     class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                     <option value="credit_card">Kartu Kredit</option>
                     <option value="bank_transfer">Transfer Bank</option>
                     <option value="cash_on_delivery">Bayar di Tempat</option>
                  </select>
               </div>
               <div class="text-right">
                  <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-500">Selesaikan
                     Pembayaran</button>
               </div>
            </form>
         </div>
      </div>
   </section>
</x-app-layout>