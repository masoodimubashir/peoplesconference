@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge([
    'class' => 'bg-gray-700 border border-gray-800 text-gray-100 text-sm rounded-lg 
block w-full p-2.5 dark:bg-gray-700 
dark:border-gray-600 dark:placeholder-gray-700 dark:text-white ',
]) !!}>
