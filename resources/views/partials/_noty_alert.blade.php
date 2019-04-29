<script>
    @if(session('alertMessage'))
        var n = new Noty({
            text: "{{ session()->get('alertMessage') }}",
            type: "{{ session()->get('alertType') }}",
            killer: true,
            timeout: 2000,
            theme: 'metroui'
        });
        n.show();
    @endif
</script>