import Barba from '@barba/core'

export const selector = '.menu'

export function hydrate (element) {
  const home = document.getElementById('home')
  const links = Array.from([home, ...element.querySelectorAll('a')])

  // Act on page change
  Barba.hooks.enter((data) => {
    // Update links state
    for (const { url, a } of links.map(a => ({ a, url: new URL(a.href) }))) {
      a.classList.remove('is-active')
      a.classList.toggle('is-active', url.href.startsWith(window.location.href) && data.next.url.path === url.pathname)
    }
  })

  window.addEventListener('scroll', handleScroll)

  return {
    destroy: () => {
      window.removeEventListener('scroll', handleScroll)
    }
  }

  function handleScroll () {
    // Only on home
    if (window.location.pathname !== '/') return
    home.classList.toggle('is-active', document.documentElement.scrollTop < window.innerHeight / 2)
  }
}
