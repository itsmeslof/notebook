@props(['output', 'heading'])

<div
    id="markdownOutput"
    class="bg-white border rounded-md"
    x-data="outputData"
    x-init="extractToc()"
    {{ $attributes }}
>
    <div class="border-b p-4 flex justify-between">
        <x-dashboard-heading-text class="flex items-center">
            {{ $heading }}
        </x-dashboard-heading-text>
        <div x-show="hasToc">
            <x-dropdown
                align="right"
                width="80"
            >
                <x-slot name="trigger">
                    <x-buttons.secondary size="sm">

                        <div>Table Of Contents</div>

                        <div class="ml-1">
                            <svg
                                class="fill-current h-4 w-4"
                                xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 20 20"
                            >
                                <path
                                    fill-rule="evenodd"
                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                    clip-rule="evenodd"
                                />
                            </svg>
                        </div>
                    </x-buttons.secondary>
                </x-slot>

                <x-slot name="content">
                    <div
                        id="toc-placeholder"
                        class="prose px-6 max-h-[240px] overflow-y-scroll"
                    >
                    </div>
                </x-slot>
            </x-dropdown>
        </div>
    </div>
    <div class="flex justify-center px-10 py-10">
        <div class="prose">
            @if ($output)
                {!! $output !!}
            @else
                <p class="text-center">No markdown content found.</p>
            @endif
        </div>
    </div>

    <script>
        const outputData = function() {
            return {
                hasToc: false,
                extractToc() {
                    let tocElem = document.querySelector('.table-of-contents');

                    if (tocElem) {
                        this.hasToc = true;
                        let tocPlaceholder = document.querySelector('#toc-placeholder');
                        tocElem.parentNode.removeChild(tocElem);
                        tocPlaceholder.appendChild(tocElem);
                    }
                }
            }
        };
    </script>
</div>
