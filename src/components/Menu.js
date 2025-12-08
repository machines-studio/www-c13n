import Barba from '@barba/core'

export const selector = '.menu'

export function hydrate (element) {
  const links = Array.from(element.querySelectorAll('a'))

  // Act on page change
  Barba.hooks.enter((data) => {
    // Update links state
    for (const { url, a } of links.map(a => ({ a, url: new URL(a.href) }))) {
      a.classList.remove('is-active')
      a.classList.toggle('is-active', url.href.startsWith(window.location.href) && data.next.url.path === url.pathname)
    }
  })
}
