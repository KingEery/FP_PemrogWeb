// profilconsultant.js - FIXED VERSION

document.addEventListener("DOMContentLoaded", () => {
  console.log("DOM loaded, initializing profile consultant page...")

  // Get modal elements
  const bookingModal = document.getElementById("bookingModal")
  const freeTrialModal = document.getElementById("freeTrialModal")

  // Get button elements
  const bookingBtn = document.getElementById("bookingBtn")
  const freeTrialBtn = document.getElementById("freeTrialBtn")

  // Get close button elements
  const closeBookingBtn = document.getElementById("closeBookingBtn")
  const closeFreeTrialBtn = document.getElementById("closeFreeTrialBtn")
  const cancelBookingBtn = document.getElementById("cancelBookingBtn")
  const cancelFreeTrialBtn = document.getElementById("cancelFreeTrialBtn")

  // Check if elements exist
  if (!bookingModal || !freeTrialModal) {
    console.error("Modal elements not found")
    return
  }

  if (!bookingBtn || !freeTrialBtn) {
    console.error("Button elements not found")
    return
  }

  console.log("All elements found, setting up event listeners...")

  // Function to show booking modal
  function showBookingModal() {
    console.log("Showing booking modal")
    bookingModal.classList.remove("hidden")
    document.body.style.overflow = "hidden" // Prevent background scrolling
  }

  // Function to hide booking modal
  function hideBookingModal() {
    console.log("Hiding booking modal")
    bookingModal.classList.add("hidden")
    document.body.style.overflow = "auto" // Restore scrolling
  }

  // Function to show free trial modal
  function showFreeTrialModal() {
    console.log("Showing free trial modal")
    freeTrialModal.classList.remove("hidden")
    document.body.style.overflow = "hidden" // Prevent background scrolling
  }

  // Function to hide free trial modal
  function hideFreeTrialModal() {
    console.log("Hiding free trial modal")
    freeTrialModal.classList.add("hidden")
    document.body.style.overflow = "auto" // Restore scrolling
  }

  // Event listeners for booking modal
  bookingBtn.addEventListener("click", (e) => {
    e.preventDefault()
    console.log("Booking button clicked")
    showBookingModal()
  })

  // Event listeners for free trial modal
  freeTrialBtn.addEventListener("click", (e) => {
    e.preventDefault()
    console.log("Free trial button clicked")
    showFreeTrialModal()
  })

  // Close booking modal event listeners
  if (closeBookingBtn) {
    closeBookingBtn.addEventListener("click", (e) => {
      e.preventDefault()
      console.log("Close booking button clicked")
      hideBookingModal()
    })
  }

  if (cancelBookingBtn) {
    cancelBookingBtn.addEventListener("click", (e) => {
      e.preventDefault()
      console.log("Cancel booking button clicked")
      hideBookingModal()
    })
  }

  // Close free trial modal event listeners
  if (closeFreeTrialBtn) {
    closeFreeTrialBtn.addEventListener("click", (e) => {
      e.preventDefault()
      console.log("Close free trial button clicked")
      hideFreeTrialModal()
    })
  }

  if (cancelFreeTrialBtn) {
    cancelFreeTrialBtn.addEventListener("click", (e) => {
      e.preventDefault()
      console.log("Cancel free trial button clicked")
      hideFreeTrialModal()
    })
  }

  // Close modal when clicking outside (backdrop click)
  document.addEventListener("click", (e) => {
    // Check if click is on booking modal backdrop
    if (e.target === bookingModal) {
      console.log("Clicked on booking modal backdrop")
      hideBookingModal()
    }

    // Check if click is on free trial modal backdrop
    if (e.target === freeTrialModal) {
      console.log("Clicked on free trial modal backdrop")
      hideFreeTrialModal()
    }
  })

  // Close modal with Escape key
  document.addEventListener("keydown", (e) => {
    if (e.key === "Escape") {
      if (!bookingModal.classList.contains("hidden")) {
        console.log("Escape key pressed, closing booking modal")
        hideBookingModal()
      }
      if (!freeTrialModal.classList.contains("hidden")) {
        console.log("Escape key pressed, closing free trial modal")
        hideFreeTrialModal()
      }
    }
  })

  // Form validation and submission handling
  const bookingForm = document.querySelector("#bookingModal form")
  const freeTrialForm = document.querySelector("#freeTrialModal form")

  if (bookingForm) {
    bookingForm.addEventListener("submit", (e) => {
      console.log("Booking form submitted")

      // Basic validation
      const requiredFields = bookingForm.querySelectorAll("[required]")
      let isValid = true

      requiredFields.forEach((field) => {
        if (!field.value.trim()) {
          isValid = false
          field.classList.add("border-red-500")
          console.log("Required field missing:", field.name)
        } else {
          field.classList.remove("border-red-500")
        }
      })

      if (!isValid) {
        e.preventDefault()
        alert("Mohon lengkapi semua field yang wajib diisi")
        return false
      }

      // Show loading state
      const submitBtn = bookingForm.querySelector('button[type="submit"]')
      if (submitBtn) {
        submitBtn.disabled = true
        submitBtn.textContent = "Memproses..."
      }
    })
  }

  if (freeTrialForm) {
    freeTrialForm.addEventListener("submit", (e) => {
      console.log("Free trial form submitted")

      // Basic validation
      const requiredFields = freeTrialForm.querySelectorAll("[required]")
      let isValid = true

      requiredFields.forEach((field) => {
        if (!field.value.trim()) {
          isValid = false
          field.classList.add("border-red-500")
          console.log("Required field missing:", field.name)
        } else {
          field.classList.remove("border-red-500")
        }
      })

      if (!isValid) {
        e.preventDefault()
        alert("Mohon lengkapi semua field yang wajib diisi")
        return false
      }

      // Show loading state
      const submitBtn = freeTrialForm.querySelector('button[type="submit"]')
      if (submitBtn) {
        submitBtn.disabled = true
        submitBtn.textContent = "Memproses..."
      }
    })
  }

  // Dynamic price calculation for booking form
  const durationSelect = document.querySelector('select[name="duration"]')
  const totalPriceElement = document.getElementById("totalPrice")

  if (durationSelect && totalPriceElement) {
    durationSelect.addEventListener("change", function () {
      const duration = Number.parseInt(this.value) || 60
      const hourlyRate = 150000 // Default rate, should be dynamic from consultant data
      const platformFee = 5000

      const consultationFee = (hourlyRate / 60) * duration
      const total = consultationFee + platformFee

      totalPriceElement.textContent = `Rp ${total.toLocaleString("id-ID")}`
      console.log("Price updated for duration:", duration, "Total:", total)
    })
  }

  // Date validation - prevent past dates
  const dateInputs = document.querySelectorAll('input[type="date"]')
  dateInputs.forEach((input) => {
    const today = new Date().toISOString().split("T")[0]
    input.setAttribute("min", today)

    input.addEventListener("change", function () {
      const selectedDate = new Date(this.value)
      const today = new Date()
      today.setHours(0, 0, 0, 0)

      if (selectedDate < today) {
        alert("Tanggal tidak boleh di masa lalu")
        this.value = ""
      }
    })
  })

  console.log("Profile consultant page initialized successfully")
})

// Additional utility functions
function formatCurrency(amount) {
  return new Intl.NumberFormat("id-ID", {
    style: "currency",
    currency: "IDR",
    minimumFractionDigits: 0,
  }).format(amount)
}

function validateEmail(email) {
  const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/
  return emailRegex.test(email)
}

function validatePhone(phone) {
  const phoneRegex = /^(\+62|62|0)[0-9]{9,13}$/
  return phoneRegex.test(phone.replace(/\s+/g, ""))
}

// Export functions for testing
if (typeof window !== "undefined") {
  window.profileConsultantUtils = {
    formatCurrency,
    validateEmail,
    validatePhone,
  }
}
