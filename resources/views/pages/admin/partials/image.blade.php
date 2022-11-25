<label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="{{$field}}">Upload {{Str::of($field)->ucfirst()->replace('_', ' ')}}</label>
<input class="h-12 block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" aria-describedby="file_input_help" id="{{$field}}" type="file">
<p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="file_input_help">SVG, PNG, JPG or GIF (MAX. 800x400px).</p>
