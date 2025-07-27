<x-layouts.auth>

<form method="post" class="space-y-2">
        
@csrf
    <x-input 
            id="email" 
            label="البريد الإلكتروني" 
            icon="icon-[tabler--mail]" 
            type="email" 
        />
        
        <x-input 
            id="password" 
            label="كلمة المرور" 
            icon="icon-[tabler--lock]" 
            type="password" 
        />

        <button type="submit" class="btn btn-primary w-full mt-8">تسجيل دخول</button>

            <span class="text-white">
               ماعندك حساب ؟
               <a href="register" class="link link-animated text-white hover:text-red-600">  انشاء حسابك </a>
            </span>
    </form>

</x-layouts.auth>





























<!-- 
<div class="space-y-2">




<div class="input-floating w-96">
  <input type="email" placeholder="exampel@gmile.com" class="input" id="floatingInput" />
  <label class="input-floating-label top-4" for="floatingInput ">
    
  <span class="icon-[tabler--mail] size-6 relative top-2 text-black"></span>
  البريد الاكتروني 

</label>
  


</div>



<div class="input-floating w-96">
  <input type="password" placeholder="*********" class="input" id="floatingInput" />
  <label class="input-floating-label top-4" for="floatingInput ">

  <span class="icon-[tabler--lock] size-6 relative top-1 text-black" ></span>
  كلمة السر 


  </label>
  
</div>





<div class="mt-6">
<button class="btn btn-primary w-full">تسجيل الدخول </button>
</div>


<span class="text-white">
ماعندك حساب ؟
<a href="register" class="link link-animated text-white hover:text-red-600">  انشاء حسابك </a>
</span>


</div>
 -->

