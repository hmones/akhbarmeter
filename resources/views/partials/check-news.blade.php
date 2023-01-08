<form id="checkNewsForm" action="{{route('check.news.store')}}" method="POST">
    @csrf
    <div
        class="bg-blue-700 text-white p-20 flex flex-col w-full items-center justify-center mx-auto space-y-4 my-8 md:my-16">
        <div class="flex flex-col">
            <h1 class="text-xl font-extrabold leading-10 md:text-5xl md:tracking-tight text-center">Your source of truth
                always!</h1>
        </div>
        <div class="flex-initial w-4/5 md:w-1/2 flex-col">
            <p class="text-sm leading-7 font-normal md:text-xl text-center">
                Check your news via our rating engine, and make sure that you read what’ true!
            </p>
        </div>
        <div id="checkNewsErrorBag" class="flex flex-col mx-auto justify-center">

        </div>
        <div class="flex flex-col lg:flex-row space-y-2 lg:space-x-2 lg:space-y-0 w-2/3 mt-8 mx-auto justify-center items-center rtl:space-x-reverse">
            <div class="w-full lg:w-1/2">
                <x-input.text id="urlField" name="url" placeholder="Paste news link here..."/>
            </div>
            <div id="checkNewsSubmitButton"
                 class="bg-blue-500 hover:bg-blue-400 pt-2.5 h-12 mt-1 text-white cursor-pointer rounded w-full lg:w-1/4 text-center">
                <span id="checkNewsText" class="text-base leading-6 font-medium">
                    Check its accuracy now!
                </span>
            </div>
        </div>
    </div>
</form>
<script>
    let checkNewsButtonClicked = false
    $('#checkNewsSubmitButton').on('click', function () {
        if (!checkNewsButtonClicked) {
            const data = $('#checkNewsForm').serialize()
            $.ajax({
                method: "POST",
                url: "{{route('check.news.store')}}",
                data: data
            }).done(function (response) {
                $('#checkNewsErrorBag').html()
                $('#checkNewsText').html("<em class='fa fa-check-circle text-green-600'></em>&nbsp;" + response)
                $('#urlField').val("")
                checkNewsButtonClicked = true
                $('#checkNewsSubmitButton').removeClass('bg-blue-500 hover:bg-blue-400 text-white').addClass('bg-gray-200 text-black')
            }).fail(function (response) {
                if(response.responseJSON.message === 'articleExist') {
                    window.location.replace("/articles?query=" + $('#urlField').val())
                }
                $('#checkNewsErrorBag').html(response.responseJSON.message)
            })


        }
    })
</script>
