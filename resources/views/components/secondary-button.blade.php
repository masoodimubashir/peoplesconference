<button {{ $attributes->merge(['type' => 'button', 'class' => 'inline-flex items-center px-4 py-2 dark:bg-gray-800 border border-gray-700   rounded-md font-semibold text-xs text-white hover:text-white  uppercase tracking-widest shadow-sm hover:bg-gray-700 disabled:opacity-25 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
