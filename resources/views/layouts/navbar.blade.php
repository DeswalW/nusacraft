<div class="fixed bottom-0 w-full bg-white shadow-[0px_-4px_16px_rgba(0,0,0,0.25)] rounded-t-3xl z-50 px-6">
    <ul class="flex justify-center items-center w-full h-[60px]">
        <li class="w-full flex justify-center items-center">
            <a class="flex items-center gap-2 bg-[#284067] px-3 py-1 rounded-full" href="/">
                <svg
                    xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                    <path d="M20.04 6.82189L14.28 2.79189C12.71 1.69189 10.3 1.75189 8.78999 2.92189L3.77999 6.83189C2.77999 7.61189 1.98999 9.21189 1.98999 10.4719V17.3719C1.98999 19.9219 4.05999 22.0019 6.60999 22.0019H17.39C19.94 22.0019 22.01 19.9319 22.01 17.3819V10.6019C22.01 9.25189 21.14 7.59189 20.04 6.82189ZM12.75 18.0019C12.75 18.4119 12.41 18.7519 12 18.7519C11.59 18.7519 11.25 18.4119 11.25 18.0019V15.0019C11.25 14.5919 11.59 14.2519 12 14.2519C12.41 14.2519 12.75 14.5919 12.75 15.0019V18.0019Z"
                        fill="#ffffff"/>
                </svg>
                <h1 class="text-[10px] font-semibold text-white">Home</h1>
            </a>
        </li>
        @foreach ($products as $product)
        <!-- with image -->
        <li class="w-full flex justify-center items-center">
            <a href="{{ route('ar.show', $product) }}" class="flex justify-center items-center">
                <button class="bg-[#284067] rounded-full p-[16px] absolute bottom-8 shadow-2xl shadow-[#284067]">
                        <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 40 40" fill="none">
                            <path d="M3.33337 14.9999V11.6666C3.33337 6.66659 6.66671 3.33325 11.6667 3.33325H28.3334C33.3334 3.33325 36.6667 6.66659 36.6667 11.6666V14.9999M3.33337 24.9999V28.3333C3.33337 33.3333 6.66671 36.6666 11.6667 36.6666H28.3334C33.3334 36.6666 36.6667 33.3333 36.6667 28.3333V24.9999" stroke="white" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M11.1666 15.4333L20 20.55L28.7666 15.4667M20 29.6167V20.5333" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M17.9334 10.4833L12.6 13.45C11.4 14.1167 10.4 15.8 10.4 17.1834V22.8333C10.4 24.2167 11.3834 25.9 12.6 26.5667L17.9334 29.5333C19.0667 30.1667 20.9334 30.1667 22.0834 29.5333L27.4167 26.5667C28.6167 25.9 29.6167 24.2167 29.6167 22.8333V17.1834C29.6167 15.8 28.6334 14.1167 27.4167 13.45L22.0834 10.4833C20.9334 9.83335 19.0667 9.83335 17.9334 10.4833Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                          </svg>
                </button>
            </a>
        </li>
        @endforeach
        <li class=" w-full flex justify-center items-center">
            <a class="flex items-center" href="/">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                    <path d="M12 2C9.37996 2 7.24996 4.13 7.24996 6.75C7.24996 9.32 9.25996 11.4 11.88 11.49C11.96 11.48 12.04 11.48 12.1 11.49H12.17C13.3993 11.449 14.5645 10.9315 15.4192 10.0469C16.274 9.16234 16.7512 7.98004 16.75 6.75C16.75 4.13 14.62 2 12 2ZM17.08 14.149C14.29 12.289 9.73996 12.289 6.92996 14.149C5.65996 14.999 4.95996 16.149 4.95996 17.379C4.95996 18.609 5.65996 19.749 6.91996 20.589C8.31996 21.529 10.16 21.999 12 21.999C13.84 21.999 15.68 21.529 17.08 20.589C18.34 19.739 19.04 18.599 19.04 17.359C19.03 16.129 18.34 14.989 17.08 14.149Z"
                    fill="#284067"/>
                </svg>
                <h1 class="hidden">Profil</h1>
            </a>
        </li>
    </ul>
</div>