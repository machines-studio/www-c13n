import IS_MOBILE from '/utils/is-mobile'

export const selector = '.projects'

export function hydrate (element) {
  if (IS_MOBILE) return

  let nextFrame
  const gallery = element.querySelector('.projects__gallery')
  const details = element.querySelectorAll('details')
  const images = element.querySelectorAll('.projects__item .gallery li')

  // Modify DOM on desktop (OMG…)
  for (const image of images) gallery.appendChild(image)

  // Bindings
  for (const detail of details) detail.addEventListener('click', handleDetailClick)
  gallery.addEventListener('wheel', handleGalleryWheel)

  return {}

  function open (targetDetail) {
    if (!targetDetail) return

    // Radio behavior
    for (const el of details) {
      el.open = targetDetail === el
    }
  }

  function handleDetailClick (e) {
    const current = e.target.closest('details')

    e.preventDefault()
    open(current)

    // Scroll to image
    const image = gallery.querySelector('#' + current.id)
    console.log(image.offsetLeft)
    gallery.scrollTo({
      left: image.offsetLeft,
      behavior: 'smooth',
    })
  }

  function handleGalleryWheel (e) {
    cancelAnimationFrame(nextFrame)
    nextFrame = requestAnimationFrame(() => {
      // Find currently viewed image
      let current
      for (let index = images.length - 1; index >= 0; index--) {
        current = images[index]
        if (!current.id) continue // Only use images with a valid id (first image of each gallery)
        if (current.offsetLeft < gallery.clientWidth + gallery.scrollLeft) break
      }

      // Open matching <details>
      open(element.querySelector('details#' + current.id))
    })
  }
}
