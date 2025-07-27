<x-layouts.auth>

<form method="post" enctype="multipart/form-data" class="space-y-2">
@csrf

<div class="max-w-sm input-floating">
  <input type="file" accept="image/*" class="input" id="avatar" name="avatar" />
  <label class="input-floating-label rounded-2xl " for="avatar">صوره الحساب </label>
</div>

@error("avatar")
    <div class="text-error helper-text ps-3 mb-2">
          {{ $message }}
    </div>
  @enderror



       <x-input id="name" minLength="4" maxlength="10" label="اسم المستخدم" icon="icon-[tabler--user]" />
        <x-input id="email" minLength="11" maxlength="30"   pattern="^[a-zA-Z0-9._%+-]+@(gmail|hotmail|icloud|outlook|yahoo)\.com$"    label="البريد الإلكتروني" icon="icon-[tabler--mail]" type="email" />
        <x-input id="password" minLength="8" maxlength="20" label="كلمة المرور" icon="icon-[tabler--lock]" type="password" pattern="^[a-zA-Z0-9\-_\s]+$"  />
        <x-input id="password_confirmation" minLength="8" maxlength="20" label="تأكيد كلمة المرور" icon="icon-[tabler--lock-check]" type="password" />

         <!-- @if ($errors->any())
              <ul class="text-white" >
            @foreach ($errors->all() as $error)
                   <li>
              {{ $error }}
                  </li>
               @endforeach
             </ul>
         @endif -->

        <button type="submit" class="btn btn-primary w-full mt-8 flex flex-auto">تسجيل حساب</button>




        <!-- اضافة الكاتو  -->
        <!-- <span>
            عندك حساب؟ 
            <a href="/login" class="link link-animated">سجّل دخول</a>
        </span> -->






<!-- 
<div class="input-floating w-96">
  <input type="text" placeholder="User_xxx" class="input" id="floatingInput" />


  
  <label class="input-floating-label" for="floatingInput"> 

<span class="icon-[tabler--user] size-6 relative top-1 text-black"></span>
اسم المستخدم
  </label>
</div>



<div class="input-floating w-96">
  <input type="email" placeholder="exampel@gmile.com" class="input" id="floatingInput" />
  <label class="input-floating-label" for="floatingInput">  

  <span class="icon-[tabler--mail] size-6 relative top-1 text-black"></span>
البريد الإلكتروني

  </label>
</div>



<div class="input-floating w-96">
  <input type="password" placeholder="*********" class="input" id="floatingInput" />
  <label class="input-floating-label" for="floatingInput">
  
  <span class="icon-[tabler--lock] size-6 relative top-1 text-black" ></span>

  
  كلمة السر </label>
</div>


<div class="input-floating w-96">
  <input type="password" placeholder="*********" class="input" id="floatingInput" />
  <label class="input-floating-label" for="floatingInput">
    <span class="icon-[tabler--lock-check] size-6 relative top-1 text-black"></span>

  تاكيد كلمة السر </label>
</div>




<div class="mt-6">
<button type="submit" class="btn btn-primary w-full bg-blue-300 text-black">تسجيل الحساب </button>
</div>

-->
<span class="text-white">
 عندك حساب ؟
<a href="login" class="link link-animated text-white hover:text-red-600">  سجل دخولك</a>
</span>
 

</form>
</x-layouts.auth>