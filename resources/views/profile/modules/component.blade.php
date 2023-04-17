<div class="rounded-lg overflow-hidden bg-white shadow">
    <div class="p-4 border-b">
        <div class="flex justify-between items-center">
            <div class="flex flex-col">
                <span class="text-base font-semibold">{{ $module->task }}</span>
                <span class="text-sm text-gray-700">{{ $module->description }}</span>
            </div>
            <div>
                <a class="bg-blue-500 hover:bg-blue-600 rounded px-2 py-1 text-white text-xs font-bold" href="{{ route('profile.modules.show', [$course->slug, $module->id]) }}">Перейти к заданиям</a>
            </div>
        </div>
    </div>

    @foreach ($module->parts as $part)
        <a class="block hover:bg-gray-100 p-4" href="{{ route('profile.parts.show', [$course->slug, $module->id, $part->id]) }}">
            <div class="flex justify-between items-center">
                <div class="flex flex-col">
                    <span class="text-blue-600 font-semibold text-sm">{{ $part->name }}</span>
{{--                    <span class="text-gray-600 text-xs">Количество заданий: 0</span>--}}
                </div>
                <div>
{{--                    @if (rand(1, 2) === 2)--}}
{{--                        <span class="py-1 px-2 rounded text-xs bg-red-100 text-red-800">Не пройдено</span>--}}
{{--                    @else--}}
{{--                        <span class="py-1 px-2 rounded text-xs bg-green-100 text-green-800">Пройдено</span>--}}
{{--                    @endif--}}
                </div>
            </div>
        </a>
    @endforeach
</div>
