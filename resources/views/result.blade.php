<div class="mx-auto w-100 border rounded-2xl my-20 text-center">
    <h2>Irányítószám: {{ $result['IRSZ'] }}</h2>
    <h2>Név: {{ $result['Helység'] }}</h2>
    <h2>Vármegye: {{ $result['Vármegye.megnevezése'] }}</h2>
    <h2>Település rang: {{ $result['Helység.jogállása'] }}</h2>
    <h2>Népessége: {{ $result['Lakó.népesség'] }}</h2>
    <h2>Lakások száma: {{ $result['Lakások.száma'] }}</h2>
</div>
