<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Document</title>
</head>
<body>
    <div class="flex flex-col mt-6 bg-gray-200 p-8  rounded">
    <h3 class="mt-6 text-xl my-3">ROLES</h3>
    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
        <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
        <div class="overflow-hidden border-b border-gray-200 rounded-md shadow-md">
            <table class="min-w-full overflow-x-scroll divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                <th
                    scope="col"
                    class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase"
                >
                    Name
                </th>
                <th
                    scope="col"
                    class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase"
                >
                    Status
                </th>
                <th scope="col" class="relative px-6 py-3">
                    <span class="sr-only">Edit</span>
                </th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach ($data['roles'] as $role)
                <tr class="transition-all hover:bg-gray-100 hover:shadow-lg">
                    <td class="px-6 py-4 whitespace-nowrap">
                    <div class="flex items-center">
                        <div class="ml-4">
                        <div class="text-sm font-medium text-gray-900">{{ $role->name }}</div>
                        </div>
                    </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                    <span
                        class="inline-flex px-2 text-xs font-semibold leading-5 text-green-800 bg-green-100 rounded-full"
                    >
                        Active
                    </span>
                    </td>
                    <td class="px-6 py-4 text-sm font-medium text-right whitespace-nowrap">
                        <select data-te-select-init multiple>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                            <option value="4">Four</option>
                            <option value="5">Five</option>
                            <option value="6">Six</option>
                            <option value="7">Seven</option>
                            <option value="8">Eight</option>
                        </select>
                        <label data-te-select-label-ref>Example label</label>
                    </td>
                </tr>
                @endforeach
            </tbody>
            </table>
        </div>
        </div>
    </div>
</body>
</html>