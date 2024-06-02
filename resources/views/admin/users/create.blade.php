<!-- Modal -->
<div class="fixed z-10 inset-0 overflow-y-auto hidden" id="userModal">
   <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
      <div class="fixed inset-0 transition-opacity" aria-hidden="true">
         <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
      </div>

      <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>

      <div
         class="inline-block align-bottom bg-beige rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
         <div class="bg-gray-800 px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
            <div class="sm:flex sm:items-start">
               <div
                  class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-blue-600 sm:mx-0 sm:h-10 sm:w-10">
                  <svg class="h-6 w-6 text-white" fill="currentColor" viewBox="0 0 20 20">
                     <path fill-rule="evenodd"
                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 002 0V6zm-1 8a1 1 0 100-2 1 1 0 000 2z"
                        clip-rule="evenodd" />
                  </svg>
               </div>
               <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                  <h3 class="text-lg leading-6 font-medium text-white" id="userModalTitle"></h3>
                  <div class="mt-2">
                     <form id="userForm">
                        @csrf
                        <input type="hidden" id="userId">
                        <div class="mb-4">
                           <label for="name" class="block text-sm font-medium text-gray-300">Nama</label>
                           <input type="text" name="name" id="name"
                              class="mt-1 block w-full bg-gray-900 border-gray-700 text-white rounded-md shadow-sm"
                              required>
                        </div>
                        <div class="mb-4">
                           <label for="email" class="block text-sm font-medium text-gray-300">Email</label>
                           <input type="email" name="email" id="email"
                              class="mt-1 block w-full bg-gray-900 border-gray-700 text-white rounded-md shadow-sm"
                              required>
                        </div>
                        <div class="mb-4">
                           <label for="userrole" class="block text-sm font-medium text-gray-300">Role</label>
                           <input type="text" name="userrole" id="userrole"
                              class="mt-1 block w-full bg-gray-900 border-gray-700 text-white rounded-md shadow-sm"
                              required>
                        </div>
                        <div class="mb-4">
                           <label for="password" class="block text-sm font-medium text-gray-300">Password</label>
                           <input type="password" name="password" id="password"
                              class="mt-1 block w-full bg-gray-900 border-gray-700 text-white rounded-md shadow-sm"
                              required>
                        </div>
                        <div class="mb-4">
                           <label for="password_confirmation" class="block text-sm font-medium text-gray-300">Konfirmasi
                              Password</label>
                           <input type="password" name="password_confirmation" id="password_confirmation"
                              class="mt-1 block w-full bg-gray-900 border-gray-700 text-white rounded-md shadow-sm"
                              required>
                        </div>
                        <!-- Add more fields as necessary -->
                     </form>
                  </div>
               </div>
            </div>
         </div>
         <div class="bg-gray-900 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
            <button id="saveUserBtn"
               class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-blue-600 text-base font-medium text-white hover:bg-blue-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 sm:ml-3 sm:w-auto sm:text-sm">Simpan</button>
            <button id="cancelUserBtn"
               class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-gray-600 text-base font-medium text-white hover:bg-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 sm:mt-0 sm:w-auto sm:text-sm">Batal</button>
         </div>
      </div>
   </div>
</div>
