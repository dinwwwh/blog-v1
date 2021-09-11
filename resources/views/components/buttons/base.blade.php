<button type="submit"
    @class([ 'w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium focus:outline-none focus:ring-2 focus:ring-offset-2'
    ,'text-white bg-indigo-600 hover:bg-indigo-700 focus:ring-indigo-500'=>$theme=='indigo'
    ,'text-white bg-gray-600 hover:bg-gray-700 focus:ring-gray-500'=>$theme=='gray'
    ,'text-white bg-red-600 hover:bg-red-700 focus:ring-red-500'=>$theme=='red'
    ,'text-white bg-orange-600 hover:bg-orange-700 focus:ring-orange-500'=>$theme=='orange'
    ,'text-white bg-yellow-600 hover:bg-yellow-700 focus:ring-yellow-500'=>$theme=='yellow'
    ,'text-white bg-green-600 hover:bg-green-700 focus:ring-green-500'=>$theme=='green'
    ,'text-white bg-teal-600 hover:bg-teal-700 focus:ring-teal-500'=>$theme=='teal'
    ,'text-white bg-cyan-600 hover:bg-cyan-700 focus:ring-cyan-500'=>$theme=='cyan'
    ,'text-white bg-light-blue-600 hover:bg-light-blue-700 focus:ring-light-blue-500'=>$theme=='light-blue'
    ,'text-white bg-blue-600 hover:bg-blue-700 focus:ring-blue-500'=>$theme=='blue'
    ,'text-white bg-purple-600 hover:bg-purple-700 focus:ring-purple-500'=>$theme=='purple'
    ,'text-white bg-pink-600 hover:bg-pink-700 focus:ring-pink-500'=>$theme=='pink'
    ,'text-white bg-rose-600 hover:bg-rose-700 focus:ring-rose-500'=>$theme=='rose'
    ])>
    {{ $slot }}
</button>
