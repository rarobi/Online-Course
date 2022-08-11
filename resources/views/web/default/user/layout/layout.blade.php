@include(getTemplate().'.view.layout.header',['title'=>'User Panel'])

   @include(getTemplate().'.user.layout.menu')

@yield('pages')
@include(getTemplate().'.user.layout.modals')
@include(getTemplate().'.view.layout.footer')
