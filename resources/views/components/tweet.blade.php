{{--
@props([
  
  'tweet' ,
  
  
  ])


<div class="card  mt-3">
  <a href="{{ route('tweet.view' , $tweet->id) }}">

    <div class="card-body py-4 px-7">
        <p >
  <!-- محتوى التغريدات -->
              {{ $tweet->content }}
        </p>

    </div>
    </a>
    <div class="card-actions p-4 pt-0 flex justify-between items-center">
         
    @if (request()->routeIs('home'))
            <a
              
                href="{{ route('tweet.view' , $tweet->baseTweet->id) }}" 
                class=" icon-[tabler--message-plus]   btn btn-outline rounded-2xl p-3      m-2 " >
              <!-- رد -->
            </a>

    @else
      <button
              onclick="document.querySelector(`input[name='parent_tweet_id']`).value = {{$tweet->id}}" 
                class=" icon-[tabler--message-plus]   btn btn-outline rounded-2xl p-3      m-2 " >
              <!-- رد -->
            </button>

    
    @endif

   

            <a class=" flex  btn btn-text "> 

                <div class="">
                    {{ $tweet->user->name}}
                  </div>
                <div class="avatar">
    


                  <div class="size-7 rounded-full">
     <img
        src="/storage/{{ $tweet->user->avatar }}"
        alt="Icon"
        class="scale-[1.4] origin-center block relative top-1"
      /> 
  </div> 
</div>
</a>

    </div>

</div>


@if (request()->routeIs('tweet.view'))

    <div class="ms-6 ps-2 space-y-2 border-s-2">
      
        @foreach ($tweet->childTweets as $childTweet)
            <x-tweet :tweet="$childTweet" />
        @endforeach
    </div>
@endif
 

   --}}
@props([
    'tweet',
    'showReplies' => true, // نتحكم في عرض الردود مباشرة أو لا
])

<!-- ✅ التغريدة نفسها -->
<div class="card mt-3">
    <!-- ✅ عند الضغط على التغريدة ننتقل لصفحتها -->
    <a href="{{ route('tweet.view', $tweet->id) }}">
        <div class="card-body py-4 px-7">
           <p class="whitespace-pre-wrap break-words overflow-hidden">
    {{ $tweet->content }}
</p>
        </div>
    </a>

    <!-- ✅ خيارات التغريدة -->
    <div class="card-actions p-4 pt-0 flex justify-between items-center">
        
        @if (request()->routeIs('home'))
            <!-- ✅ إذا كنا في الصفحة الرئيسية: الزر ينقلنا لصفحة التغريدة -->
            <a
                href="{{ route('tweet.view', $tweet->baseTweet->id ?? $tweet->id) }}"
                class="icon-[tabler--message-plus] btn btn-outline rounded-2xl p-3 m-2">
                <!-- رد -->
            </a>
        @else
            <!-- ✅ إذا كنا داخل صفحة تغريدة: نخلي الزر يفتح صندوق الرد ويجهز اسم المستخدم -->
            <button
                type="button"
                onclick="setReply({{ $tweet->id }}, '{{ $tweet->user->name }}')"
                class="icon-[tabler--message-plus] btn btn-outline rounded-2xl p-3 m-2">
                <!-- رد -->
            </button>
        @endif

        <!-- ✅ عرض اسم المستخدم والصورة -->
        <a class="flex btn btn-text">
            <div class="me-2">{{ $tweet->user->name }}</div>
            <div class="avatar">
                <div class="size-7 rounded-full">
                    <img
                        src="/storage/{{ $tweet->user->avatar }}"
                        alt="Icon"
                        class="scale-[1.4] origin-center block relative top-1" />
                </div>
            </div>
        </a>
    </div>
</div>

<!-- ✅ الردود -->
@if (request()->routeIs('tweet.view'))
    @if ($showReplies)
        <!-- ✅ إذا الردود للتغريدة الأصلية نعرضها مباشرة -->
        <div class="ms-6 ps-2 space-y-2 border-s-2">
            @foreach ($tweet->childTweets as $childTweet)
                <x-tweet :tweet="$childTweet" :showReplies="false" />
            @endforeach
        </div>
    @elseif ($tweet->childTweets->count() > 0)
        <!-- ✅ إذا التغريدة عبارة عن رد وله ردود أخرى: نظهر زر عرض الردود -->
        <div class="ms-6 ps-2">
            <button
                onclick="toggleReplies({{ $tweet->id }})"
                class="text-blue-500 text-sm underline hover:no-underline">
                عرض الردود ({{ $tweet->childTweets->count() }})
            </button>

            <div id="replies-{{ $tweet->id }}" class="hidden space-y-2 mt-2 border-s-2 ps-2">
                @foreach ($tweet->childTweets as $childTweet)
                    <x-tweet :tweet="$childTweet" :showReplies="false" />
                @endforeach
            </div>
        </div>
    @endif
@endif

<!-- ✅ سكربت عرض الردود -->
@once
    @push('scripts')
    <script>
        function toggleReplies(id) {
            const el = document.getElementById('replies-' + id);
            if (el) {
                el.classList.toggle('hidden');
            }
        }

        // ✅ دالة الرد على تغريدة: تجهز الصندوق بالاسم والمعرّف
        function setReply(tweetId, userName) {
            const newPostBox = document.getElementById('newPostBox');
            const replyToText = document.getElementById('replyToText');
            const replyUserName = document.getElementById('replyUserName');
            const parentInput = document.querySelector("input[name='parent_tweet_id']");
            const contentInput = document.getElementById('content');

            parentInput.value = tweetId; // تحديد ID التغريدة للرد عليها
            replyUserName.textContent = userName; // عرض اسم المستخدم
            replyToText.classList.remove('hidden'); // إظهار عبارة "رد على فلان"
            newPostBox.classList.remove('hidden'); // فتح صندوق الرد
            contentInput.focus(); // تركيز المؤشر داخل الكتابة
        }
    </script>
    @endpush
@endonce