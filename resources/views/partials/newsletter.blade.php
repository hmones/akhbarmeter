<div class="lg:container flex flex-col w-full items-center justify-center mx-auto pt-16 lg:py-16 text-white">
    <div class="flex flex-col lg:flex-row lg:w-3/5 bg-blue-700 lg:rounded justify-center p-8 space-x-4">
        <div class="flex flex-col lg:w-1/2 space-y-2 my-auto">
            <div class="flex flex-row text-3xl leading-9 font-extrabold">
                {{translate('component.newsletter.header')}}
            </div>
            <div class="flex flex-row">
                {{translate('component.newsletter.description')}}
            </div>
        </div>
        <div class="flex flex-col lg:w-1/2">
            <form class="flex flex-row space-y-4 pb-3 space-x-2 my-auto"
                  action="https://akhbarmeter.us11.list-manage.com/subscribe/post?u=2911001665bae66f0f76c3b60&amp;id=04234119df"
                  id="mc-embedded-subscribe-form"
                  method="post"
                  name="mc-embedded-subscribe-form" novalidate="" target="_blank">
                <label for="mce-EMAIL" class="hidden"></label>
                <input class="flex flex-row p-3 h-12 border border-gray-300 rounded mt-1 w-full text-black"
                       id="mce-EMAIL" name="EMAIL" placeholder="e.g. first.lastname@domain.com" spellcheck="false"
                       type="email" value=""/>
                <input class="flex flex-row px-3 py-2 h-12 shadow-sm rounded mt-1 bg-blue-500"
                       id="mc-embedded-subscribe"
                       name="subscribe" type="submit" value="{{translate('component.newsletter.button')}}">
            </form>
            <div class="flex flex-col text-xs leading-5 font-normal">
                <span>
                    {{translate('component.newsletter.hint')}}
                    <a href="#">{{translate('component.newsletter.privacy')}}</a>
                </span>
                <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
                <div aria-hidden="true" style="position: relative; left: -5000px;z-index:-1;">
                    <label class="hidden">
                        <input name="b_2911001665bae66f0f76c3b60_04234119df" tabindex="-1" type="text" value=""/>
                    </label>
                </div>
            </div>
        </div>
    </div>
</div>
