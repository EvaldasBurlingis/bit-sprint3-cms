<x-app-layout>
    authenticated! 

    <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <a :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        Logout
                    </a>
                </form>
</x-app-layout>