@props(['type'])

<div class="container mt-2" >
    {{-- <a href="https://www.hostgator.com.br/46222-77-1-834.html" target="_blank" rel="nofollow">
        <img style="border:0px" src="https://latam-files.hostgator.com/br/afiliados/hospedagem/160x600.png" width="160" height="600" alt="">
    </a> --}}
    {{-- <a href="https://www.hostgator.com.br/46222-77-1-836.html" target="_blank" rel="nofollow">
        <img style="border:0px" src="https://latam-files.hostgator.com/br/afiliados/hospedagem/300x600.png" width="300" height="600" alt="">
    </a> --}}
    @switch($type)
        @case($type == 'square')
        <a href="https://www.hostgator.com.br/46222-77-1-835.html" target="_blank" rel="nofollow"><img style="border:0px" src="https://latam-files.hostgator.com/br/afiliados/hospedagem/300x250.png" width="300" height="250" alt=""></a>
            @break
        @case($type == 'landscape')
        <a href="https://www.hostgator.com.br/46222-78-1-846.html" target="_blank" rel="nofollow"><img style="border:0px" src="https://latam-files.hostgator.com/br/afiliados/criadordesites/486x60.png" width="468" height="60" alt=""></a>
            @break
        @default
        <a href="https://www.hostgator.com.br/46222-77-1-836.html" target="_blank" rel="nofollow">
            <img style="border:0px" src="https://latam-files.hostgator.com/br/afiliados/hospedagem/300x600.png" width="300" height="600" alt="">
        </a>
    @endswitch

</div>
