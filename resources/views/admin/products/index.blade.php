<x-app-layout>
   <x-slot name="title">
      Kelola Produk
   </x-slot>

   <section class="flex">
      @include('layouts.sidebar')

<<<<<<< HEAD
        <div class="bg-whitebg flex-1 p-4 text-black">
            <div class="container mx-auto py-8">
                <h2 class="text-3xl font-bold mb-4">Kelola Produk</h2>

                <button class="bg-orange hover:bg-orangehv text-white font-bold py-1 px-3 rounded mb-4"
                    id="addProductBtn">Tambah Produk</button>

                <table class="min-w-full bg-beige rounded-lg" id="productTable">
                    <thead>
                        <tr>
                            <th class="py-2 px-4">ID</th>
                            <th class="py-2 px-4">Nama</th>
                            <th class="py-2 px-4">Deskripsi</th>
                            <th class="py-2 px-4">Harga</th>
                            <th class="py-2 px-4">Gambar</th>
                            <th class="py-2 px-4">Aksi</th>
                        </tr>
                    </thead>
                    <tbody id="productTableBody">
                        @foreach ($products as $product)
                            <tr>
                                <td class="py-2 px-4">{{ $product->id }}</td>
                                <td class="py-2 px-4">{{ $product->name }}</td>
                                <td class="py-2 px-4">{{ $product->description }}</td>
                                <td class="py-2 px-4">Rp {{ number_format($product->price) }}</td>
                                <td class="py-2 px-4"><img src="{{ url($product->image) }}" alt="{{ $product->name }}"
                                        class="w-16 h-16 object-cover rounded"></td>
                                <td class="py-2 px-4">
                                    <button id="editProductBtn"
                                        class="bg-maroon hover:bg-maroonhv text-white font-bold py-1 px-4 rounded"
                                        data-id="{{ $product->id }}">Edit</button>
                                    <button id="deleteProductBtn"
                                        class="bg-burgundy hover:bg-burgundyhv text-white font-bold py-1 px-2 rounded"
                                        data-id="{{ $product->id }}">Hapus</button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="flex justify-center">
=======
      <div class="flex-1 p-4 text-white">
         <div class="container mx-auto py-8">
            <h2 class="text-2xl font-bold mb-4">Kelola Produk</h2>

            <button class="bg-blue-600 hover:bg-blue-500 text-white font-bold py-2 px-4 rounded mb-4"
               id="addProductBtn">Tambah Produk</button>

            <table class="min-w-full bg-gray-800 rounded-lg" id="productTable">
               <thead>
                  <tr>
                     <th class="py-2 px-4">ID</th>
                     <th class="py-2 px-4">Nama</th>
                     <th class="py-2 px-4">Deskripsi</th>
                     <th class="py-2 px-4">Harga</th>
                     <th class="py-2 px-4">Gambar</th>
                     <th class="py-2 px-4">Aksi</th>
                  </tr>
               </thead>
               <tbody id="productTableBody">
                  @foreach ($products as $product)
                     <tr>
                        <td class="py-2 px-4">{{ $product->id }}</td>
                        <td class="py-2 px-4">{{ $product->name }}</td>
                        <td class="py-2 px-4">{{ Str::limit($product->description, 150, '...') }}</td>
                        <td class="py-2 px-4">Rp {{ number_format($product->price) }}</td>
                        <td class="py-2 px-4"><img src="{{ url($product->image) }}" alt="{{ $product->name }}"
                              class="w-16 h-16 object-cover rounded"></td>
                        <td class="py-2 px-4">
                           <button id="editProductBtn"
                              class="bg-yellow-500 hover:bg-yellow-400 text-white font-bold py-1 px-2 rounded"
                              data-id="{{ $product->id }}">Edit</button>
                           <button id="deleteProductBtn"
                              class="bg-red-500 hover:bg-red-400 text-white font-bold py-1 px-2 rounded"
                              data-id="{{ $product->id }}">Hapus</button>
                        </td>
                     </tr>
                  @endforeach
               </tbody>
            </table>
         </div>
         <div class="flex justify-center">
>>>>>>> 0c737c266b1be29e5da31c051ce944939eeec25f

            {{ $products->links() }}
         </div>
      </div>

      @include('admin.products.create')
   </section>

</x-app-layout>
