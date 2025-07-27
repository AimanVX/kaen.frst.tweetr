<x-layouts>

<nav class="navbar bg-base-100 rounded-box shadow-base-300/20 shadow-sm  sticky top-1 z-50    border-y border-x-4      h-16 flex items-center px-4 bg-gray-100">
  <div class="flex flex-1 items-center ">
    
  <a class="link text-base-content link-neutral  text-xl font-bold no-underline text-blue-900  flex items-center " href="/">
       KAEN <!-- <span>عصفور</span> -->
        <img src="{{ asset(path: 'images/shola_logo.png') }}" alt="Icon" class="relative top-[1px] ml-2 w-10 h-14 ">

    </a>

      <!-- <span class="icon-[tabler--] size-8  relative top-1 "></span> -->
  <!-- <img src="{{ asset(path: 'images/shola_logo.png') }}" alt="Icon" class="relative top-[1px] ml-2 w-10 h-14"> -->

  </div>
  <div class="navbar-end flex items-center gap-4 ">
    <!-- <div class="dropdown relative inline-flex [--auto-close:inside] [--offset:8] [--placement:bottom-end]">
      <button id="dropdown-scrollable" type="button" class="dropdown-toggle btn btn-text btn-circle dropdown-open:bg-base-content/10 size-10" aria-haspopup="menu" aria-expanded="false" aria-label="Dropdown">
        <div class="indicator">
          <span class="indicator-item bg-error size-2 rounded-full"></span>
          <span class="icon-[tabler--bell] text-base-content size-5.5"></span>
        </div> -->
      

        
    @if (Auth::check())
    <div class="dropdown relative inline-flex [--auto-close:inside] [--offset:8] [--placement:bottom-end]">
      <button id="dropdown-scrollable" type="button" class="dropdown-toggle flex items-center" aria-haspopup="menu" aria-expanded="false" aria-label="Dropdown">
        <div class="avatar">
          <div class="size-9.5 rounded-full">
        <img
            src="/storage/{{ Auth::user()->avatar }}"
            alt="avatar"
             class="scale-[1.4] origin-center block relative top-1"
          />

        </div>
        </div>
      </button>
      <ul class="dropdown-menu dropdown-open:opacity-100 hidden min-w-60" role="menu" aria-orientation="vertical" aria-labelledby="dropdown-avatar">
        
        <li>
          <a class="dropdown-item" href="#">
            <span class="icon-[tabler--user]"></span>
            الملف الشخصي
          </a>
        </li>
        
        <li class="dropdown-footer gap-2">
          
           <form method="post" action="{{route('logout')}}"class="w-full">
            @csrf
               <button type="submit" class="btn btn-error btn-soft btn-block" >
                  <span class="icon-[tabler--logout]"></span>
                   تسجيل خروج
               </button>
            </form>

        </li>
      </ul>
    </div>
    @else
    <!-- <div class="flex items-center"> -->

    <a href="{{ route('login') }}">
  <button class="btn btn-text btn-square"  >
  
   <span class="icon-[tabler--login] size-10  " ></span>
    </button>
   </a>


    
    @endif
    
    
    
  </div>
</nav>




<div class="mt-4">

{{ $slot }}

</div>


<button id="addPostBtn" 
  class="fixed bottom-6 right-6 bg-blue-500 text-white text-2xl w-12 h-12 rounded-full shadow-lg flex items-center justify-center hover:bg-blue-600 z-50">

<span class="icon-[tabler--edit] size-6"></span>

</button>

<!-- صندوق الكتابة -->
 <form method="post" action="{{route('tweet.create')}}">
    @csrf
    <input type="hidden" name="parent_tweet_id" value="{{ request()->tweet?->id }}" />
<div id="newPostBox" 
  class="hidden fixed bottom-24 right-6 bg-white p-4 rounded-xl shadow-xl w-80 z-50">
  <textarea required class="w-full border rounded p-2" placeholder="اكتب منشورك هنا..." id="content" name="content"></textarea>
  <!-- تعديلي |تحت-->
   <div class="p-2 pr-0">
  @error('content')
  <div>
    {{ $message }}
  </div>
   @enderror
   </div>
   <!-- انتها التعديل -->
  <div class="flex justify-end mt-2" for="content">
    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">نشر</button>
  </div>
</div>

<script>
  const addPostBtn = document.getElementById('addPostBtn');
  const newPostBox = document.getElementById('newPostBox');

  addPostBtn.addEventListener('click', () => {
    newPostBox.classList.toggle('hidden');
  });
</script>
</form>

</x-layouts>