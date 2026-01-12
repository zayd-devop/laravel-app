<div>
    <button {{ $attributes->merge(['class' => 'btn btn-' . $type]) }}>
   {{ $slot }}
    </button>

    <!-- The biggest battle is the war against ignorance. - Mustafa Kemal Atatürk -->
</div>