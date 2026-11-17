document.addEventListener("DOMContentLoaded", () => {
  const filters = document.querySelector("[data-project-filters]");
  const cards = document.querySelector("[data-projects]");
  const status = document.querySelector("[data-project-status]");

  if (!filters || !cards || !status) return;

  const tabs = filters.querySelectorAll("[data-project-term]");

  tabs.forEach((tab) => {
    tab.addEventListener("click", async () => {
      const formData = new FormData();

      formData.append("action", "veliy_projects_filter");
      formData.append("nonce", VeliyProjects.nonce);
      formData.append("term", tab.dataset.projectTerm);

      tabs.forEach((button) => {
        button.disabled = true;
      });

      cards.setAttribute("aria-busy", "true");
      status.hidden = true;

      try {
        const response = await fetch(VeliyProjects.ajaxurl, {
          method: "POST",
          body: formData,
        });

        if (!response.ok) {
          throw new Error("Ошибка запроса");
        }

        const result = await response.json();

        if (!result.success) {
          throw new Error("Ошибка загрузки проектов");
        }

        cards.innerHTML = result.data.html;

        tabs.forEach((button) => {
          const active = button === tab;

          button.classList.toggle("active", active);
          button.setAttribute("aria-pressed", String(active));
        });
      } catch (error) {
        status.textContent =
          "Не удалось загрузить проекты. Попробуйте ещё раз.";

        status.hidden = false;
      } finally {
        tabs.forEach((button) => {
          button.disabled = false;
        });

        cards.setAttribute("aria-busy", "false");
      }
    });
  });
});
