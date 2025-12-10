import { raf } from '@internet/raf'

export const selector = '.projects'

const OFFY = 100

export function hydrate (element) {
  const scroller = element.querySelector('.projects__items')

  // Used to allow element to be scrolled its whole width
  const spacer = document.createElement('div')
  spacer.classList.add('projects-spacer')
  element.insertAdjacentElement('afterend', spacer)

  //
  for (const nav of element.querySelectorAll('nav a[href^="#"]')) {
    nav.addEventListener('click', e => {
      e.preventDefault()
      const project = element.querySelector('#' + nav.href.split('#').pop())
      scrollTo(project)
    })
  }

  // Bind
  raf.add(tick)
  scroller.addEventListener('wheel', handleWheel)

  return {
    destroy: () => {
      raf.remove(tick)
    }
  }

  function tick (e) {
    const y = document.documentElement.scrollTop
    const offsetTop = spacer.offsetTop

    // Scroll scroller
    scroller.scrollLeft = y - offsetTop

    // Adjust spacer height based on element width (images are lazyloaded)
    spacer.style.height = OFFY + scroller.scrollWidth - element.clientWidth + element.clientHeight + 'px'

    // Simulate a sticky position on element (CSS sticky does not allow the full wanted behavior)
    element.style.position = 'fixed'
    element.style.top = 0
    element.style.transform = `translateY(${
      scroller.scrollLeft + scroller.clientWidth < scroller.scrollWidth
        ? Math.max(offsetTop - y, OFFY)
        : offsetTop - y + parseInt(spacer.style.height) - element.clientHeight
    }px)`
  }

  function scrollTo (project) {
    document.documentElement.scrollTop = spacer.offsetTop + project.offsetLeft
  }

  function handleWheel (e) {
    if (Math.abs(e.deltaX) < Math.abs(e.deltaY)) return
    e.preventDefault()
  }
}
