@component("mail::message")

    @component("mail::panel",["title"=>$data["title"],"meta"=>$data['meta']])
        {{$data["body"]}}
    @endcomponent

    @slot("subcopy")
        @component("mail::button",["url"=>"#"])
            Sehen auf Vorschlag
        @endcomponent
    @endslot
@endcomponent
