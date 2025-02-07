<!-- Facebook -->
<a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(Request::url()) }}" target="_blank" class="bg-gray-500 p-2 rounded-full inline-flex items-center justify-center w-10 h-10">
    <i class="fa fa-facebook text-white text-xl"></i>
</a>

<!-- Twitter -->
<a href="https://twitter.com/intent/tweet?url={{ urlencode(Request::url()) }}&text=Check out this page!" target="_blank" class="bg-gray-500 p-2 rounded-full inline-flex items-center justify-center w-10 h-10">
    <i class="fa fa-twitter text-white text-xl"></i>
</a>


<!-- WhatsApp -->
<a href="https://wa.me/?text=Check out this page: {{ urlencode(Request::url()) }}" target="_blank" class="bg-gray-500 p-2 rounded-full inline-flex items-center justify-center w-10 h-10">
    <i class="fa fa-whatsapp text-white text-xl"></i>
</a>

<!-- Instagram -->
{{--<a href="https://www.instagram.com" target="_blank" class="bg-gray-500 p-2 rounded-full inline-flex items-center justify-center w-10 h-10">
    <i class="fa fa-instagram text-white text-xl"></i>
</a>--}}
