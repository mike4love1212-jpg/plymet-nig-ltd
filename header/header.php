  <?php
    session_start();
  ?>
  <div class="pt-[6rem]">

            <header class="fixed bg-slate-200 shadow-md inset-x-0 top-0 z-50 ">
              <nav aria-label="Global" class="flex items-center justify-between p- lg:px-8">
                <div class="flex lg:flex-1">
                  <a href="#" class="-m-1.5 p-1.5">
                    <span class="text-1xl text-green-500 font-bold ">PLYMET NIG LTD</span>
                    <img src="./logo3.png" alt="" class="h-18 w-19 mb-5" />
                  </a>
                </div>
                <div class="flex lg:hidden">
                  <button type="button" command="show-modal" commandfor="mobile-menu" class="-m-2.5 inline-flex items-center justify-center rounded-md p-2.5 text-gray-700">
                    <span class="sr-only">Open main menu</span>
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" data-slot="icon" aria-hidden="true" class="size-6">
                      <path d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                  </button>
                </div>
                <div class="hidden lg:flex lg:gap-x-12">
                  <a href="./index.php" class="text-sm/6 font-semibold text-gray-900">Home</a>
                  <a href="./index.php#about" class="text-sm/6 font-semibold text-gray-900">About us</a>
                  <a href="./index.php#contact" class="text-sm/6 font-semibold text-gray-900">Contact</a>
                  <a href="market.php" class="text-sm/6 font-semibold text-gray-900">Marketplace</a>
                </div>
                <div class="hidden lg:flex lg:flex-1 lg:justify-end">
                  <?php
                    if (isset($_SESSION['user_id'])) {
                      echo '<a href="logout.php" class="text-sm/6 font-semibold bg-black py-2 px-4 rounded-md text-slate-300">Log out <span aria-hidden="true">&rarr;</span></a>';
                    } else {
                      echo '<a href="login.php" class="text-sm/6 font-semibold text-green-600">Log in <span aria-hidden="true">&rarr;</span></a>';
                    }
                  ?>
                </div>
              </nav>
              <el-dialog>
                <dialog id="mobile-menu" class="backdrop:bg-transparent lg:hidden">
                  <div tabindex="0" class="fixed inset-0 focus:outline-none">
                    <el-dialog-panel class="fixed inset-y-0 right-0 z-50 w-full overflow-y-auto bg-white p-6 sm:max-w-sm sm:ring-1 sm:ring-gray-900/10">
                      <div class="flex items-center justify-between">
                        <a href="#" class="-m-1.5 p-1.5">
                          <span class="sr-only">PLYMET</span>
                          <img src="./logo3.png" alt="" class="h-8 w-auto" />
                        </a>
                        <button type="button" command="close" commandfor="mobile-menu" class="-m-2.5 rounded-md p-2.5 text-gray-700">
                          <span class="sr-only">Close menu</span>
                          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" data-slot="icon" aria-hidden="true" class="size-6">
                            <path d="M6 18 18 6M6 6l12 12" stroke-linecap="round" stroke-linejoin="round" />
                          </svg>
                        </button>
                      </div>
                      <div class="mt-6 flow-root">
                        <div class="-my-6 divide-y divide-gray-500/10">
                          <div class="space-y-2 py-6">
                            <a href="./index.php" class="-mx-3 block rounded-lg px-3 py-2 text-base/7 font-semibold text-gray-900 hover:bg-gray-50">Home</a>
                            <a href="./index.php#about" class="-mx-3 block rounded-lg px-3 py-2 text-base/7 font-semibold text-gray-900 hover:bg-gray-50">About us</a>
                            <a href="./index.php#contact" class="-mx-3 block rounded-lg px-3 py-2 text-base/7 font-semibold text-gray-900 hover:bg-gray-50">Contact</a>
                            <a href="market.php" class="-mx-3 block rounded-lg px-3 py-2 text-base/7 font-semibold text-gray-900 hover:bg-gray-50">Marketplace</a>
                          </div>
                          <div class="py-6">
                            <a href="register.php" class="-mx-3 block rounded-lg px-3 py-2.5 text-success font-semibold text-gray-900 hover:bg-gray-50">Sign Up</a>
                          </div>
                        </div>
                      </div>
                    </el-dialog-panel>
                  </div>
                </dialog>
              </el-dialog>
            </header>
          
        </div>