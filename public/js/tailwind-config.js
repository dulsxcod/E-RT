tailwind.config = {
  darkMode: "class",
  theme: {
    extend: {
      "colors": {
              "secondary-fixed": "#6ffbbe",
              "surface": "#f8f9ff",
              "surface-container-highest": "#d3e4fe",
              "tertiary-fixed-dim": "#c0c1ff",
              "on-secondary-fixed-variant": "#005236",
              "on-secondary-container": "#00714d",
              "surface-variant": "#d3e4fe",
              "primary-fixed": "#dbe1ff",
              "surface-container-low": "#eff4ff",
              "tertiary-container": "#585be6",
              "secondary": "#006c49",
              "secondary-container": "#6cf8bb",
              "outline": "#737686",
              "primary": "#004ac6",
              "on-surface-variant": "#434655",
              "on-error-container": "#93000a",
              "outline-variant": "#c3c6d7",
              "surface-bright": "#f8f9ff",
              "surface-dim": "#cbdbf5",
              "on-secondary": "#ffffff",
              "tertiary-fixed": "#e1e0ff",
              "tertiary": "#3e3fcc",
              "on-tertiary": "#ffffff",
              "secondary-fixed-dim": "#4edea3",
              "primary-fixed-dim": "#b4c5ff",
              "on-error": "#ffffff",
              "on-surface": "#0b1c30",
              "on-primary-container": "#eeefff",
              "error": "#ba1a1a",
              "on-tertiary-fixed": "#07006c",
              "error-container": "#ffdad6",
              "on-primary-fixed": "#00174b",
              "surface-container-lowest": "#ffffff",
              "on-tertiary-fixed-variant": "#2f2ebe",
              "surface-container-high": "#dce9ff",
              "on-tertiary-container": "#f1eeff",
              "surface-tint": "#0053db",
              "inverse-primary": "#b4c5ff",
              "on-background": "#0b1c30",
              "on-primary": "#ffffff",
              "on-primary-fixed-variant": "#003ea8",
              "surface-container": "#e5eeff",
              "background": "#f8f9ff",
              "primary-container": "#2563eb",
              "inverse-surface": "#213145",
              "on-secondary-fixed": "#002113",
              "inverse-on-surface": "#eaf1ff"
      },
      "borderRadius": {
              "DEFAULT": "0.25rem",
              "lg": "0.5rem",
              "xl": "0.75rem",
              "full": "9999px"
      },
      "spacing": {
              "gutter": "24px",
              "stack-gap": "16px",
              "container-padding-desktop": "32px",
              "container-padding-mobile": "16px",
              "base": "4px"
      },
      "fontFamily": {
              "headline-md": [
                      "Geist", "sans-serif"
              ],
              "body-sm": [
                      "Inter", "sans-serif"
              ],
              "headline-lg-mobile": [
                      "Geist", "sans-serif"
              ],
              "headline-lg": [
                      "Geist", "sans-serif"
              ],
              "body-lg": [
                      "Inter", "sans-serif"
              ],
              "label-caps": [
                      "Geist", "sans-serif"
              ]
      },
      "fontSize": {
              "headline-md": [
                      "20px",
                      {
                              "lineHeight": "28px",
                              "fontWeight": "600"
                      }
              ],
              "body-sm": [
                      "14px",
                      {
                              "lineHeight": "20px",
                              "fontWeight": "400"
                      }
              ],
              "headline-lg-mobile": [
                      "24px",
                      {
                              "lineHeight": "32px",
                              "letterSpacing": "-0.01em",
                              "fontWeight": "700"
                      }
              ],
              "headline-lg": [
                      "32px",
                      {
                              "lineHeight": "40px",
                              "letterSpacing": "-0.02em",
                              "fontWeight": "700"
                      }
              ],
              "body-lg": [
                      "16px",
                      {
                              "lineHeight": "24px",
                              "fontWeight": "400"
                      }
              ],
              "label-caps": [
                      "12px",
                      {
                              "lineHeight": "16px",
                              "letterSpacing": "0.05em",
                              "fontWeight": "600"
                      }
              ]
      }
    },
  },
}
