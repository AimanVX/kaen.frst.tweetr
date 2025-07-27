<x-layouts>
<!-- التغيير هنا اضافي من عندي من FLEX-COL  الى FLEX-ROW -->
<div class="flex flex-col justify-center items-center  h-[100vh]   ">  
<!-- flex flex-col justify-center items-center  h-[100vh]  -->
<div class="mb-12">
  <div class="flex flex-row">
<h class="font-bold text-4xl text-blue-50 ml-2 relative top-10 ">
KAEN </h>
   <div class="h-10 w-10 flex items-center justify-center overflow-visible">
      <img
        src="{{ asset('images/shola_logo.png') }}"
        alt="Icon"
        class="scale-[2] origin-center block relative top-8"
      />
    </div>

</div>
</div>


<div class="mt-4">
  {{ $slot }}
</div>










</div>
</x-layouts>