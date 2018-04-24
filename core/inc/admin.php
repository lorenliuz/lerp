<?php

/**
 * Load functions for the Lerp panel menu.
 */
if ( is_admin() ) {
    require_once 'admin-pages/lerp-panel-functions.php';
    require_once 'admin-pages/support.php';
}

function lerp_welcome_page()
{
    require_once 'admin-pages/welcome.php';
}

function lerp_admin_menu()
{
    if ( current_user_can('edit_theme_options') ) {
        add_menu_page('UNCODE', UNCODE_NAME, 'administrator', 'lerp-system-status', 'lerp_welcome_page', 'data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0idXRmLTgiPz48c3ZnIHZlcnNpb249IjEuMSIgaWQ9IkxheWVyXzEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHg9IjBweCIgeT0iMHB4IiB2aWV3Qm94PSIwIDAgMjAwIDIwMCIgZW5hYmxlLWJhY2tncm91bmQ9Im5ldyAwIDAgMjAwIDIwMCIgeG1sOnNwYWNlPSJwcmVzZXJ2ZSI+PGcgaWQ9Imljb21vb24taWdub3JlIiBkaXNwbGF5PSJub25lIj48bGluZSBkaXNwbGF5PSJpbmxpbmUiIG9wYWNpdHk9IjAuMyIgZmlsbD0ibm9uZSIgc3Ryb2tlPSIjNDQ5RkRCIiBlbmFibGUtYmFja2dyb3VuZD0ibmV3ICAgICIgeDE9IjQxNS4xIiB5MT0iLTQxMiIgeDI9IjQxNS4xIiB5Mj0iLTIxMiIvPjxsaW5lIGRpc3BsYXk9ImlubGluZSIgZmlsbD0ibm9uZSIgc3Ryb2tlPSIjNDQ5RkRCIiB4MT0iNDE4LjIiIHkxPSItNDEyIiB4Mj0iNDE4LjIiIHkyPSItMjEyIi8+PGxpbmUgZGlzcGxheT0iaW5saW5lIiBvcGFjaXR5PSIwLjMiIGZpbGw9Im5vbmUiIHN0cm9rZT0iIzQ0OUZEQiIgZW5hYmxlLWJhY2tncm91bmQ9Im5ldyAgICAiIHgxPSI0MjEuNCIgeTE9Ii00MTIiIHgyPSI0MjEuNCIgeTI9Ii0yMTIiLz48bGluZSBkaXNwbGF5PSJpbmxpbmUiIGZpbGw9Im5vbmUiIHN0cm9rZT0iIzQ0OUZEQiIgeDE9IjQyNC41IiB5MT0iLTQxMiIgeDI9IjQyNC41IiB5Mj0iLTIxMiIvPjxsaW5lIGRpc3BsYXk9ImlubGluZSIgb3BhY2l0eT0iMC4zIiBmaWxsPSJub25lIiBzdHJva2U9IiM0NDlGREIiIGVuYWJsZS1iYWNrZ3JvdW5kPSJuZXcgICAgIiB4MT0iNDI3LjYiIHkxPSItNDEyIiB4Mj0iNDI3LjYiIHkyPSItMjEyIi8+PGxpbmUgZGlzcGxheT0iaW5saW5lIiBmaWxsPSJub25lIiBzdHJva2U9IiM0NDlGREIiIHgxPSI0MzAuOCIgeTE9Ii00MTIiIHgyPSI0MzAuOCIgeTI9Ii0yMTIiLz48bGluZSBkaXNwbGF5PSJpbmxpbmUiIG9wYWNpdHk9IjAuMyIgZmlsbD0ibm9uZSIgc3Ryb2tlPSIjNDQ5RkRCIiBlbmFibGUtYmFja2dyb3VuZD0ibmV3ICAgICIgeDE9IjQzMy45IiB5MT0iLTQxMiIgeDI9IjQzMy45IiB5Mj0iLTIxMiIvPjxsaW5lIGRpc3BsYXk9ImlubGluZSIgZmlsbD0ibm9uZSIgc3Ryb2tlPSIjNDQ5RkRCIiB4MT0iNDM3IiB5MT0iLTQxMiIgeDI9IjQzNyIgeTI9Ii0yMTIiLz48bGluZSBkaXNwbGF5PSJpbmxpbmUiIG9wYWNpdHk9IjAuMyIgZmlsbD0ibm9uZSIgc3Ryb2tlPSIjNDQ5RkRCIiBlbmFibGUtYmFja2dyb3VuZD0ibmV3ICAgICIgeDE9IjQ0MC4xIiB5MT0iLTQxMiIgeDI9IjQ0MC4xIiB5Mj0iLTIxMiIvPjxsaW5lIGRpc3BsYXk9ImlubGluZSIgZmlsbD0ibm9uZSIgc3Ryb2tlPSIjNDQ5RkRCIiB4MT0iNDQzLjIiIHkxPSItNDEyIiB4Mj0iNDQzLjIiIHkyPSItMjEyIi8+PGxpbmUgZGlzcGxheT0iaW5saW5lIiBvcGFjaXR5PSIwLjMiIGZpbGw9Im5vbmUiIHN0cm9rZT0iIzQ0OUZEQiIgZW5hYmxlLWJhY2tncm91bmQ9Im5ldyAgICAiIHgxPSI0NDYuNCIgeTE9Ii00MTIiIHgyPSI0NDYuNCIgeTI9Ii0yMTIiLz48bGluZSBkaXNwbGF5PSJpbmxpbmUiIGZpbGw9Im5vbmUiIHN0cm9rZT0iIzQ0OUZEQiIgeDE9IjQ0OS41IiB5MT0iLTQxMiIgeDI9IjQ0OS41IiB5Mj0iLTIxMiIvPjxsaW5lIGRpc3BsYXk9ImlubGluZSIgb3BhY2l0eT0iMC4zIiBmaWxsPSJub25lIiBzdHJva2U9IiM0NDlGREIiIGVuYWJsZS1iYWNrZ3JvdW5kPSJuZXcgICAgIiB4MT0iNDUyLjYiIHkxPSItNDEyIiB4Mj0iNDUyLjYiIHkyPSItMjEyIi8+PGxpbmUgZGlzcGxheT0iaW5saW5lIiBmaWxsPSJub25lIiBzdHJva2U9IiM0NDlGREIiIHgxPSI0NTUuOCIgeTE9Ii00MTIiIHgyPSI0NTUuOCIgeTI9Ii0yMTIiLz48bGluZSBkaXNwbGF5PSJpbmxpbmUiIG9wYWNpdHk9IjAuMyIgZmlsbD0ibm9uZSIgc3Ryb2tlPSIjNDQ5RkRCIiBlbmFibGUtYmFja2dyb3VuZD0ibmV3ICAgICIgeDE9IjQ1OC45IiB5MT0iLTQxMiIgeDI9IjQ1OC45IiB5Mj0iLTIxMiIvPjxsaW5lIGRpc3BsYXk9ImlubGluZSIgZmlsbD0ibm9uZSIgc3Ryb2tlPSIjNDQ5RkRCIiB4MT0iNDYyIiB5MT0iLTQxMiIgeDI9IjQ2MiIgeTI9Ii0yMTIiLz48bGluZSBkaXNwbGF5PSJpbmxpbmUiIG9wYWNpdHk9IjAuMyIgZmlsbD0ibm9uZSIgc3Ryb2tlPSIjNDQ5RkRCIiBlbmFibGUtYmFja2dyb3VuZD0ibmV3ICAgICIgeDE9IjQ2NS4xIiB5MT0iLTQxMiIgeDI9IjQ2NS4xIiB5Mj0iLTIxMiIvPjxsaW5lIGRpc3BsYXk9ImlubGluZSIgZmlsbD0ibm9uZSIgc3Ryb2tlPSIjNDQ5RkRCIiB4MT0iNDY4LjIiIHkxPSItNDEyIiB4Mj0iNDY4LjIiIHkyPSItMjEyIi8+PGxpbmUgZGlzcGxheT0iaW5saW5lIiBvcGFjaXR5PSIwLjMiIGZpbGw9Im5vbmUiIHN0cm9rZT0iIzQ0OUZEQiIgZW5hYmxlLWJhY2tncm91bmQ9Im5ldyAgICAiIHgxPSI0NzEuNCIgeTE9Ii00MTIiIHgyPSI0NzEuNCIgeTI9Ii0yMTIiLz48bGluZSBkaXNwbGF5PSJpbmxpbmUiIGZpbGw9Im5vbmUiIHN0cm9rZT0iIzQ0OUZEQiIgeDE9IjQ3NC41IiB5MT0iLTQxMiIgeDI9IjQ3NC41IiB5Mj0iLTIxMiIvPjxsaW5lIGRpc3BsYXk9ImlubGluZSIgb3BhY2l0eT0iMC4zIiBmaWxsPSJub25lIiBzdHJva2U9IiM0NDlGREIiIGVuYWJsZS1iYWNrZ3JvdW5kPSJuZXcgICAgIiB4MT0iNDc3LjYiIHkxPSItNDEyIiB4Mj0iNDc3LjYiIHkyPSItMjEyIi8+PGxpbmUgZGlzcGxheT0iaW5saW5lIiBmaWxsPSJub25lIiBzdHJva2U9IiM0NDlGREIiIHgxPSI0ODAuOCIgeTE9Ii00MTIiIHgyPSI0ODAuOCIgeTI9Ii0yMTIiLz48bGluZSBkaXNwbGF5PSJpbmxpbmUiIG9wYWNpdHk9IjAuMyIgZmlsbD0ibm9uZSIgc3Ryb2tlPSIjNDQ5RkRCIiBlbmFibGUtYmFja2dyb3VuZD0ibmV3ICAgICIgeDE9IjQ4My45IiB5MT0iLTQxMiIgeDI9IjQ4My45IiB5Mj0iLTIxMiIvPjxsaW5lIGRpc3BsYXk9ImlubGluZSIgZmlsbD0ibm9uZSIgc3Ryb2tlPSIjNDQ5RkRCIiB4MT0iNDg3IiB5MT0iLTQxMiIgeDI9IjQ4NyIgeTI9Ii0yMTIiLz48bGluZSBkaXNwbGF5PSJpbmxpbmUiIG9wYWNpdHk9IjAuMyIgZmlsbD0ibm9uZSIgc3Ryb2tlPSIjNDQ5RkRCIiBlbmFibGUtYmFja2dyb3VuZD0ibmV3ICAgICIgeDE9IjQ5MC4xIiB5MT0iLTQxMiIgeDI9IjQ5MC4xIiB5Mj0iLTIxMiIvPjxsaW5lIGRpc3BsYXk9ImlubGluZSIgZmlsbD0ibm9uZSIgc3Ryb2tlPSIjNDQ5RkRCIiB4MT0iNDkzLjIiIHkxPSItNDEyIiB4Mj0iNDkzLjIiIHkyPSItMjEyIi8+PGxpbmUgZGlzcGxheT0iaW5saW5lIiBvcGFjaXR5PSIwLjMiIGZpbGw9Im5vbmUiIHN0cm9rZT0iIzQ0OUZEQiIgZW5hYmxlLWJhY2tncm91bmQ9Im5ldyAgICAiIHgxPSI0OTYuNCIgeTE9Ii00MTIiIHgyPSI0OTYuNCIgeTI9Ii0yMTIiLz48bGluZSBkaXNwbGF5PSJpbmxpbmUiIGZpbGw9Im5vbmUiIHN0cm9rZT0iIzQ0OUZEQiIgeDE9IjQ5OS41IiB5MT0iLTQxMiIgeDI9IjQ5OS41IiB5Mj0iLTIxMiIvPjxsaW5lIGRpc3BsYXk9ImlubGluZSIgb3BhY2l0eT0iMC4zIiBmaWxsPSJub25lIiBzdHJva2U9IiM0NDlGREIiIGVuYWJsZS1iYWNrZ3JvdW5kPSJuZXcgICAgIiB4MT0iNTAyLjYiIHkxPSItNDEyIiB4Mj0iNTAyLjYiIHkyPSItMjEyIi8+PGxpbmUgZGlzcGxheT0iaW5saW5lIiBmaWxsPSJub25lIiBzdHJva2U9IiM0NDlGREIiIHgxPSI1MDUuOCIgeTE9Ii00MTIiIHgyPSI1MDUuOCIgeTI9Ii0yMTIiLz48bGluZSBkaXNwbGF5PSJpbmxpbmUiIG9wYWNpdHk9IjAuMyIgZmlsbD0ibm9uZSIgc3Ryb2tlPSIjNDQ5RkRCIiBlbmFibGUtYmFja2dyb3VuZD0ibmV3ICAgICIgeDE9IjUwOC45IiB5MT0iLTQxMiIgeDI9IjUwOC45IiB5Mj0iLTIxMiIvPjxsaW5lIGRpc3BsYXk9ImlubGluZSIgZmlsbD0ibm9uZSIgc3Ryb2tlPSIjNDQ5RkRCIiB4MT0iNTEyIiB5MT0iLTQxMiIgeDI9IjUxMiIgeTI9Ii0yMTIiLz48bGluZSBkaXNwbGF5PSJpbmxpbmUiIG9wYWNpdHk9IjAuMyIgZmlsbD0ibm9uZSIgc3Ryb2tlPSIjNDQ5RkRCIiBlbmFibGUtYmFja2dyb3VuZD0ibmV3ICAgICIgeDE9IjUxNS4xIiB5MT0iLTQxMiIgeDI9IjUxNS4xIiB5Mj0iLTIxMiIvPjxsaW5lIGRpc3BsYXk9ImlubGluZSIgZmlsbD0ibm9uZSIgc3Ryb2tlPSIjNDQ5RkRCIiB4MT0iNTE4LjIiIHkxPSItNDEyIiB4Mj0iNTE4LjIiIHkyPSItMjEyIi8+PGxpbmUgZGlzcGxheT0iaW5saW5lIiBvcGFjaXR5PSIwLjMiIGZpbGw9Im5vbmUiIHN0cm9rZT0iIzQ0OUZEQiIgZW5hYmxlLWJhY2tncm91bmQ9Im5ldyAgICAiIHgxPSI1MjEuNCIgeTE9Ii00MTIiIHgyPSI1MjEuNCIgeTI9Ii0yMTIiLz48bGluZSBkaXNwbGF5PSJpbmxpbmUiIGZpbGw9Im5vbmUiIHN0cm9rZT0iIzQ0OUZEQiIgeDE9IjUyNC41IiB5MT0iLTQxMiIgeDI9IjUyNC41IiB5Mj0iLTIxMiIvPjxsaW5lIGRpc3BsYXk9ImlubGluZSIgb3BhY2l0eT0iMC4zIiBmaWxsPSJub25lIiBzdHJva2U9IiM0NDlGREIiIGVuYWJsZS1iYWNrZ3JvdW5kPSJuZXcgICAgIiB4MT0iNTI3LjYiIHkxPSItNDEyIiB4Mj0iNTI3LjYiIHkyPSItMjEyIi8+PGxpbmUgZGlzcGxheT0iaW5saW5lIiBmaWxsPSJub25lIiBzdHJva2U9IiM0NDlGREIiIHgxPSI1MzAuOCIgeTE9Ii00MTIiIHgyPSI1MzAuOCIgeTI9Ii0yMTIiLz48bGluZSBkaXNwbGF5PSJpbmxpbmUiIG9wYWNpdHk9IjAuMyIgZmlsbD0ibm9uZSIgc3Ryb2tlPSIjNDQ5RkRCIiBlbmFibGUtYmFja2dyb3VuZD0ibmV3ICAgICIgeDE9IjUzMy45IiB5MT0iLTQxMiIgeDI9IjUzMy45IiB5Mj0iLTIxMiIvPjxsaW5lIGRpc3BsYXk9ImlubGluZSIgZmlsbD0ibm9uZSIgc3Ryb2tlPSIjNDQ5RkRCIiB4MT0iNTM3IiB5MT0iLTQxMiIgeDI9IjUzNyIgeTI9Ii0yMTIiLz48bGluZSBkaXNwbGF5PSJpbmxpbmUiIG9wYWNpdHk9IjAuMyIgZmlsbD0ibm9uZSIgc3Ryb2tlPSIjNDQ5RkRCIiBlbmFibGUtYmFja2dyb3VuZD0ibmV3ICAgICIgeDE9IjU0MC4xIiB5MT0iLTQxMiIgeDI9IjU0MC4xIiB5Mj0iLTIxMiIvPjxsaW5lIGRpc3BsYXk9ImlubGluZSIgZmlsbD0ibm9uZSIgc3Ryb2tlPSIjNDQ5RkRCIiB4MT0iNTQzLjIiIHkxPSItNDEyIiB4Mj0iNTQzLjIiIHkyPSItMjEyIi8+PGxpbmUgZGlzcGxheT0iaW5saW5lIiBvcGFjaXR5PSIwLjMiIGZpbGw9Im5vbmUiIHN0cm9rZT0iIzQ0OUZEQiIgZW5hYmxlLWJhY2tncm91bmQ9Im5ldyAgICAiIHgxPSI1NDYuNCIgeTE9Ii00MTIiIHgyPSI1NDYuNCIgeTI9Ii0yMTIiLz48bGluZSBkaXNwbGF5PSJpbmxpbmUiIGZpbGw9Im5vbmUiIHN0cm9rZT0iIzQ0OUZEQiIgeDE9IjU0OS41IiB5MT0iLTQxMiIgeDI9IjU0OS41IiB5Mj0iLTIxMiIvPjxsaW5lIGRpc3BsYXk9ImlubGluZSIgb3BhY2l0eT0iMC4zIiBmaWxsPSJub25lIiBzdHJva2U9IiM0NDlGREIiIGVuYWJsZS1iYWNrZ3JvdW5kPSJuZXcgICAgIiB4MT0iNTUyLjYiIHkxPSItNDEyIiB4Mj0iNTUyLjYiIHkyPSItMjEyIi8+PGxpbmUgZGlzcGxheT0iaW5saW5lIiBmaWxsPSJub25lIiBzdHJva2U9IiM0NDlGREIiIHgxPSI1NTUuOCIgeTE9Ii00MTIiIHgyPSI1NTUuOCIgeTI9Ii0yMTIiLz48bGluZSBkaXNwbGF5PSJpbmxpbmUiIG9wYWNpdHk9IjAuMyIgZmlsbD0ibm9uZSIgc3Ryb2tlPSIjNDQ5RkRCIiBlbmFibGUtYmFja2dyb3VuZD0ibmV3ICAgICIgeDE9IjU1OC45IiB5MT0iLTQxMiIgeDI9IjU1OC45IiB5Mj0iLTIxMiIvPjxsaW5lIGRpc3BsYXk9ImlubGluZSIgZmlsbD0ibm9uZSIgc3Ryb2tlPSIjNDQ5RkRCIiB4MT0iNTYyIiB5MT0iLTQxMiIgeDI9IjU2MiIgeTI9Ii0yMTIiLz48bGluZSBkaXNwbGF5PSJpbmxpbmUiIG9wYWNpdHk9IjAuMyIgZmlsbD0ibm9uZSIgc3Ryb2tlPSIjNDQ5RkRCIiBlbmFibGUtYmFja2dyb3VuZD0ibmV3ICAgICIgeDE9IjU2NS4xIiB5MT0iLTQxMiIgeDI9IjU2NS4xIiB5Mj0iLTIxMiIvPjxsaW5lIGRpc3BsYXk9ImlubGluZSIgZmlsbD0ibm9uZSIgc3Ryb2tlPSIjNDQ5RkRCIiB4MT0iNTY4LjIiIHkxPSItNDEyIiB4Mj0iNTY4LjIiIHkyPSItMjEyIi8+PGxpbmUgZGlzcGxheT0iaW5saW5lIiBvcGFjaXR5PSIwLjMiIGZpbGw9Im5vbmUiIHN0cm9rZT0iIzQ0OUZEQiIgZW5hYmxlLWJhY2tncm91bmQ9Im5ldyAgICAiIHgxPSI1NzEuNCIgeTE9Ii00MTIiIHgyPSI1NzEuNCIgeTI9Ii0yMTIiLz48bGluZSBkaXNwbGF5PSJpbmxpbmUiIGZpbGw9Im5vbmUiIHN0cm9rZT0iIzQ0OUZEQiIgeDE9IjU3NC41IiB5MT0iLTQxMiIgeDI9IjU3NC41IiB5Mj0iLTIxMiIvPjxsaW5lIGRpc3BsYXk9ImlubGluZSIgb3BhY2l0eT0iMC4zIiBmaWxsPSJub25lIiBzdHJva2U9IiM0NDlGREIiIGVuYWJsZS1iYWNrZ3JvdW5kPSJuZXcgICAgIiB4MT0iNTc3LjYiIHkxPSItNDEyIiB4Mj0iNTc3LjYiIHkyPSItMjEyIi8+PGxpbmUgZGlzcGxheT0iaW5saW5lIiBmaWxsPSJub25lIiBzdHJva2U9IiM0NDlGREIiIHgxPSI1ODAuOCIgeTE9Ii00MTIiIHgyPSI1ODAuOCIgeTI9Ii0yMTIiLz48bGluZSBkaXNwbGF5PSJpbmxpbmUiIG9wYWNpdHk9IjAuMyIgZmlsbD0ibm9uZSIgc3Ryb2tlPSIjNDQ5RkRCIiBlbmFibGUtYmFja2dyb3VuZD0ibmV3ICAgICIgeDE9IjU4My45IiB5MT0iLTQxMiIgeDI9IjU4My45IiB5Mj0iLTIxMiIvPjxsaW5lIGRpc3BsYXk9ImlubGluZSIgZmlsbD0ibm9uZSIgc3Ryb2tlPSIjNDQ5RkRCIiB4MT0iNTg3IiB5MT0iLTQxMiIgeDI9IjU4NyIgeTI9Ii0yMTIiLz48bGluZSBkaXNwbGF5PSJpbmxpbmUiIG9wYWNpdHk9IjAuMyIgZmlsbD0ibm9uZSIgc3Ryb2tlPSIjNDQ5RkRCIiBlbmFibGUtYmFja2dyb3VuZD0ibmV3ICAgICIgeDE9IjU5MC4xIiB5MT0iLTQxMiIgeDI9IjU5MC4xIiB5Mj0iLTIxMiIvPjxsaW5lIGRpc3BsYXk9ImlubGluZSIgZmlsbD0ibm9uZSIgc3Ryb2tlPSIjNDQ5RkRCIiB4MT0iNTkzLjIiIHkxPSItNDEyIiB4Mj0iNTkzLjIiIHkyPSItMjEyIi8+PGxpbmUgZGlzcGxheT0iaW5saW5lIiBvcGFjaXR5PSIwLjMiIGZpbGw9Im5vbmUiIHN0cm9rZT0iIzQ0OUZEQiIgZW5hYmxlLWJhY2tncm91bmQ9Im5ldyAgICAiIHgxPSI1OTYuNCIgeTE9Ii00MTIiIHgyPSI1OTYuNCIgeTI9Ii0yMTIiLz48bGluZSBkaXNwbGF5PSJpbmxpbmUiIGZpbGw9Im5vbmUiIHN0cm9rZT0iIzQ0OUZEQiIgeDE9IjU5OS41IiB5MT0iLTQxMiIgeDI9IjU5OS41IiB5Mj0iLTIxMiIvPjxsaW5lIGRpc3BsYXk9ImlubGluZSIgb3BhY2l0eT0iMC4zIiBmaWxsPSJub25lIiBzdHJva2U9IiM0NDlGREIiIGVuYWJsZS1iYWNrZ3JvdW5kPSJuZXcgICAgIiB4MT0iNjAyLjYiIHkxPSItNDEyIiB4Mj0iNjAyLjYiIHkyPSItMjEyIi8+PGxpbmUgZGlzcGxheT0iaW5saW5lIiBmaWxsPSJub25lIiBzdHJva2U9IiM0NDlGREIiIHgxPSI2MDUuOCIgeTE9Ii00MTIiIHgyPSI2MDUuOCIgeTI9Ii0yMTIiLz48bGluZSBkaXNwbGF5PSJpbmxpbmUiIG9wYWNpdHk9IjAuMyIgZmlsbD0ibm9uZSIgc3Ryb2tlPSIjNDQ5RkRCIiBlbmFibGUtYmFja2dyb3VuZD0ibmV3ICAgICIgeDE9IjYwOC45IiB5MT0iLTQxMiIgeDI9IjYwOC45IiB5Mj0iLTIxMiIvPjxsaW5lIGRpc3BsYXk9ImlubGluZSIgb3BhY2l0eT0iMC4zIiBmaWxsPSJub25lIiBzdHJva2U9IiM0NDlGREIiIGVuYWJsZS1iYWNrZ3JvdW5kPSJuZXcgICAgIiB4MT0iNDEyIiB5MT0iLTQwOC45IiB4Mj0iNjEyIiB5Mj0iLTQwOC45Ii8+PGxpbmUgZGlzcGxheT0iaW5saW5lIiBmaWxsPSJub25lIiBzdHJva2U9IiM0NDlGREIiIHgxPSI0MTIiIHkxPSItNDA1LjgiIHgyPSI2MTIiIHkyPSItNDA1LjgiLz48bGluZSBkaXNwbGF5PSJpbmxpbmUiIG9wYWNpdHk9IjAuMyIgZmlsbD0ibm9uZSIgc3Ryb2tlPSIjNDQ5RkRCIiBlbmFibGUtYmFja2dyb3VuZD0ibmV3ICAgICIgeDE9IjQxMiIgeTE9Ii00MDIuNiIgeDI9IjYxMiIgeTI9Ii00MDIuNiIvPjxsaW5lIGRpc3BsYXk9ImlubGluZSIgZmlsbD0ibm9uZSIgc3Ryb2tlPSIjNDQ5RkRCIiB4MT0iNDEyIiB5MT0iLTM5OS41IiB4Mj0iNjEyIiB5Mj0iLTM5OS41Ii8+PGxpbmUgZGlzcGxheT0iaW5saW5lIiBvcGFjaXR5PSIwLjMiIGZpbGw9Im5vbmUiIHN0cm9rZT0iIzQ0OUZEQiIgZW5hYmxlLWJhY2tncm91bmQ9Im5ldyAgICAiIHgxPSI0MTIiIHkxPSItMzk2LjQiIHgyPSI2MTIiIHkyPSItMzk2LjQiLz48bGluZSBkaXNwbGF5PSJpbmxpbmUiIGZpbGw9Im5vbmUiIHN0cm9rZT0iIzQ0OUZEQiIgeDE9IjQxMiIgeTE9Ii0zOTMuMiIgeDI9IjYxMiIgeTI9Ii0zOTMuMiIvPjxsaW5lIGRpc3BsYXk9ImlubGluZSIgb3BhY2l0eT0iMC4zIiBmaWxsPSJub25lIiBzdHJva2U9IiM0NDlGREIiIGVuYWJsZS1iYWNrZ3JvdW5kPSJuZXcgICAgIiB4MT0iNDEyIiB5MT0iLTM5MC4xIiB4Mj0iNjEyIiB5Mj0iLTM5MC4xIi8+PGxpbmUgZGlzcGxheT0iaW5saW5lIiBmaWxsPSJub25lIiBzdHJva2U9IiM0NDlGREIiIHgxPSI0MTIiIHkxPSItMzg3IiB4Mj0iNjEyIiB5Mj0iLTM4NyIvPjxsaW5lIGRpc3BsYXk9ImlubGluZSIgb3BhY2l0eT0iMC4zIiBmaWxsPSJub25lIiBzdHJva2U9IiM0NDlGREIiIGVuYWJsZS1iYWNrZ3JvdW5kPSJuZXcgICAgIiB4MT0iNDEyIiB5MT0iLTM4My45IiB4Mj0iNjEyIiB5Mj0iLTM4My45Ii8+PGxpbmUgZGlzcGxheT0iaW5saW5lIiBmaWxsPSJub25lIiBzdHJva2U9IiM0NDlGREIiIHgxPSI0MTIiIHkxPSItMzgwLjgiIHgyPSI2MTIiIHkyPSItMzgwLjgiLz48bGluZSBkaXNwbGF5PSJpbmxpbmUiIG9wYWNpdHk9IjAuMyIgZmlsbD0ibm9uZSIgc3Ryb2tlPSIjNDQ5RkRCIiBlbmFibGUtYmFja2dyb3VuZD0ibmV3ICAgICIgeDE9IjQxMiIgeTE9Ii0zNzcuNiIgeDI9IjYxMiIgeTI9Ii0zNzcuNiIvPjxsaW5lIGRpc3BsYXk9ImlubGluZSIgZmlsbD0ibm9uZSIgc3Ryb2tlPSIjNDQ5RkRCIiB4MT0iNDEyIiB5MT0iLTM3NC41IiB4Mj0iNjEyIiB5Mj0iLTM3NC41Ii8+PGxpbmUgZGlzcGxheT0iaW5saW5lIiBvcGFjaXR5PSIwLjMiIGZpbGw9Im5vbmUiIHN0cm9rZT0iIzQ0OUZEQiIgZW5hYmxlLWJhY2tncm91bmQ9Im5ldyAgICAiIHgxPSI0MTIiIHkxPSItMzcxLjQiIHgyPSI2MTIiIHkyPSItMzcxLjQiLz48bGluZSBkaXNwbGF5PSJpbmxpbmUiIGZpbGw9Im5vbmUiIHN0cm9rZT0iIzQ0OUZEQiIgeDE9IjQxMiIgeTE9Ii0zNjguMiIgeDI9IjYxMiIgeTI9Ii0zNjguMiIvPjxsaW5lIGRpc3BsYXk9ImlubGluZSIgb3BhY2l0eT0iMC4zIiBmaWxsPSJub25lIiBzdHJva2U9IiM0NDlGREIiIGVuYWJsZS1iYWNrZ3JvdW5kPSJuZXcgICAgIiB4MT0iNDEyIiB5MT0iLTM2NS4xIiB4Mj0iNjEyIiB5Mj0iLTM2NS4xIi8+PGxpbmUgZGlzcGxheT0iaW5saW5lIiBmaWxsPSJub25lIiBzdHJva2U9IiM0NDlGREIiIHgxPSI0MTIiIHkxPSItMzYyIiB4Mj0iNjEyIiB5Mj0iLTM2MiIvPjxsaW5lIGRpc3BsYXk9ImlubGluZSIgb3BhY2l0eT0iMC4zIiBmaWxsPSJub25lIiBzdHJva2U9IiM0NDlGREIiIGVuYWJsZS1iYWNrZ3JvdW5kPSJuZXcgICAgIiB4MT0iNDEyIiB5MT0iLTM1OC45IiB4Mj0iNjEyIiB5Mj0iLTM1OC45Ii8+PGxpbmUgZGlzcGxheT0iaW5saW5lIiBmaWxsPSJub25lIiBzdHJva2U9IiM0NDlGREIiIHgxPSI0MTIiIHkxPSItMzU1LjgiIHgyPSI2MTIiIHkyPSItMzU1LjgiLz48bGluZSBkaXNwbGF5PSJpbmxpbmUiIG9wYWNpdHk9IjAuMyIgZmlsbD0ibm9uZSIgc3Ryb2tlPSIjNDQ5RkRCIiBlbmFibGUtYmFja2dyb3VuZD0ibmV3ICAgICIgeDE9IjQxMiIgeTE9Ii0zNTIuNiIgeDI9IjYxMiIgeTI9Ii0zNTIuNiIvPjxsaW5lIGRpc3BsYXk9ImlubGluZSIgZmlsbD0ibm9uZSIgc3Ryb2tlPSIjNDQ5RkRCIiB4MT0iNDEyIiB5MT0iLTM0OS41IiB4Mj0iNjEyIiB5Mj0iLTM0OS41Ii8+PGxpbmUgZGlzcGxheT0iaW5saW5lIiBvcGFjaXR5PSIwLjMiIGZpbGw9Im5vbmUiIHN0cm9rZT0iIzQ0OUZEQiIgZW5hYmxlLWJhY2tncm91bmQ9Im5ldyAgICAiIHgxPSI0MTIiIHkxPSItMzQ2LjQiIHgyPSI2MTIiIHkyPSItMzQ2LjQiLz48bGluZSBkaXNwbGF5PSJpbmxpbmUiIGZpbGw9Im5vbmUiIHN0cm9rZT0iIzQ0OUZEQiIgeDE9IjQxMiIgeTE9Ii0zNDMuMiIgeDI9IjYxMiIgeTI9Ii0zNDMuMiIvPjxsaW5lIGRpc3BsYXk9ImlubGluZSIgb3BhY2l0eT0iMC4zIiBmaWxsPSJub25lIiBzdHJva2U9IiM0NDlGREIiIGVuYWJsZS1iYWNrZ3JvdW5kPSJuZXcgICAgIiB4MT0iNDEyIiB5MT0iLTM0MC4xIiB4Mj0iNjEyIiB5Mj0iLTM0MC4xIi8+PGxpbmUgZGlzcGxheT0iaW5saW5lIiBmaWxsPSJub25lIiBzdHJva2U9IiM0NDlGREIiIHgxPSI0MTIiIHkxPSItMzM3IiB4Mj0iNjEyIiB5Mj0iLTMzNyIvPjxsaW5lIGRpc3BsYXk9ImlubGluZSIgb3BhY2l0eT0iMC4zIiBmaWxsPSJub25lIiBzdHJva2U9IiM0NDlGREIiIGVuYWJsZS1iYWNrZ3JvdW5kPSJuZXcgICAgIiB4MT0iNDEyIiB5MT0iLTMzMy45IiB4Mj0iNjEyIiB5Mj0iLTMzMy45Ii8+PGxpbmUgZGlzcGxheT0iaW5saW5lIiBmaWxsPSJub25lIiBzdHJva2U9IiM0NDlGREIiIHgxPSI0MTIiIHkxPSItMzMwLjgiIHgyPSI2MTIiIHkyPSItMzMwLjgiLz48bGluZSBkaXNwbGF5PSJpbmxpbmUiIG9wYWNpdHk9IjAuMyIgZmlsbD0ibm9uZSIgc3Ryb2tlPSIjNDQ5RkRCIiBlbmFibGUtYmFja2dyb3VuZD0ibmV3ICAgICIgeDE9IjQxMiIgeTE9Ii0zMjcuNiIgeDI9IjYxMiIgeTI9Ii0zMjcuNiIvPjxsaW5lIGRpc3BsYXk9ImlubGluZSIgZmlsbD0ibm9uZSIgc3Ryb2tlPSIjNDQ5RkRCIiB4MT0iNDEyIiB5MT0iLTMyNC41IiB4Mj0iNjEyIiB5Mj0iLTMyNC41Ii8+PGxpbmUgZGlzcGxheT0iaW5saW5lIiBvcGFjaXR5PSIwLjMiIGZpbGw9Im5vbmUiIHN0cm9rZT0iIzQ0OUZEQiIgZW5hYmxlLWJhY2tncm91bmQ9Im5ldyAgICAiIHgxPSI0MTIiIHkxPSItMzIxLjQiIHgyPSI2MTIiIHkyPSItMzIxLjQiLz48bGluZSBkaXNwbGF5PSJpbmxpbmUiIGZpbGw9Im5vbmUiIHN0cm9rZT0iIzQ0OUZEQiIgeDE9IjQxMiIgeTE9Ii0zMTguMiIgeDI9IjYxMiIgeTI9Ii0zMTguMiIvPjxsaW5lIGRpc3BsYXk9ImlubGluZSIgb3BhY2l0eT0iMC4zIiBmaWxsPSJub25lIiBzdHJva2U9IiM0NDlGREIiIGVuYWJsZS1iYWNrZ3JvdW5kPSJuZXcgICAgIiB4MT0iNDEyIiB5MT0iLTMxNS4xIiB4Mj0iNjEyIiB5Mj0iLTMxNS4xIi8+PGxpbmUgZGlzcGxheT0iaW5saW5lIiBmaWxsPSJub25lIiBzdHJva2U9IiM0NDlGREIiIHgxPSI0MTIiIHkxPSItMzEyIiB4Mj0iNjEyIiB5Mj0iLTMxMiIvPjxsaW5lIGRpc3BsYXk9ImlubGluZSIgb3BhY2l0eT0iMC4zIiBmaWxsPSJub25lIiBzdHJva2U9IiM0NDlGREIiIGVuYWJsZS1iYWNrZ3JvdW5kPSJuZXcgICAgIiB4MT0iNDEyIiB5MT0iLTMwOC45IiB4Mj0iNjEyIiB5Mj0iLTMwOC45Ii8+PGxpbmUgZGlzcGxheT0iaW5saW5lIiBmaWxsPSJub25lIiBzdHJva2U9IiM0NDlGREIiIHgxPSI0MTIiIHkxPSItMzA1LjgiIHgyPSI2MTIiIHkyPSItMzA1LjgiLz48bGluZSBkaXNwbGF5PSJpbmxpbmUiIG9wYWNpdHk9IjAuMyIgZmlsbD0ibm9uZSIgc3Ryb2tlPSIjNDQ5RkRCIiBlbmFibGUtYmFja2dyb3VuZD0ibmV3ICAgICIgeDE9IjQxMiIgeTE9Ii0zMDIuNiIgeDI9IjYxMiIgeTI9Ii0zMDIuNiIvPjxsaW5lIGRpc3BsYXk9ImlubGluZSIgZmlsbD0ibm9uZSIgc3Ryb2tlPSIjNDQ5RkRCIiB4MT0iNDEyIiB5MT0iLTI5OS41IiB4Mj0iNjEyIiB5Mj0iLTI5OS41Ii8+PGxpbmUgZGlzcGxheT0iaW5saW5lIiBvcGFjaXR5PSIwLjMiIGZpbGw9Im5vbmUiIHN0cm9rZT0iIzQ0OUZEQiIgZW5hYmxlLWJhY2tncm91bmQ9Im5ldyAgICAiIHgxPSI0MTIiIHkxPSItMjk2LjQiIHgyPSI2MTIiIHkyPSItMjk2LjQiLz48bGluZSBkaXNwbGF5PSJpbmxpbmUiIGZpbGw9Im5vbmUiIHN0cm9rZT0iIzQ0OUZEQiIgeDE9IjQxMiIgeTE9Ii0yOTMuMiIgeDI9IjYxMiIgeTI9Ii0yOTMuMiIvPjxsaW5lIGRpc3BsYXk9ImlubGluZSIgb3BhY2l0eT0iMC4zIiBmaWxsPSJub25lIiBzdHJva2U9IiM0NDlGREIiIGVuYWJsZS1iYWNrZ3JvdW5kPSJuZXcgICAgIiB4MT0iNDEyIiB5MT0iLTI5MC4xIiB4Mj0iNjEyIiB5Mj0iLTI5MC4xIi8+PGxpbmUgZGlzcGxheT0iaW5saW5lIiBmaWxsPSJub25lIiBzdHJva2U9IiM0NDlGREIiIHgxPSI0MTIiIHkxPSItMjg3IiB4Mj0iNjEyIiB5Mj0iLTI4NyIvPjxsaW5lIGRpc3BsYXk9ImlubGluZSIgb3BhY2l0eT0iMC4zIiBmaWxsPSJub25lIiBzdHJva2U9IiM0NDlGREIiIGVuYWJsZS1iYWNrZ3JvdW5kPSJuZXcgICAgIiB4MT0iNDEyIiB5MT0iLTI4My45IiB4Mj0iNjEyIiB5Mj0iLTI4My45Ii8+PGxpbmUgZGlzcGxheT0iaW5saW5lIiBmaWxsPSJub25lIiBzdHJva2U9IiM0NDlGREIiIHgxPSI0MTIiIHkxPSItMjgwLjgiIHgyPSI2MTIiIHkyPSItMjgwLjgiLz48bGluZSBkaXNwbGF5PSJpbmxpbmUiIG9wYWNpdHk9IjAuMyIgZmlsbD0ibm9uZSIgc3Ryb2tlPSIjNDQ5RkRCIiBlbmFibGUtYmFja2dyb3VuZD0ibmV3ICAgICIgeDE9IjQxMiIgeTE9Ii0yNzcuNiIgeDI9IjYxMiIgeTI9Ii0yNzcuNiIvPjxsaW5lIGRpc3BsYXk9ImlubGluZSIgZmlsbD0ibm9uZSIgc3Ryb2tlPSIjNDQ5RkRCIiB4MT0iNDEyIiB5MT0iLTI3NC41IiB4Mj0iNjEyIiB5Mj0iLTI3NC41Ii8+PGxpbmUgZGlzcGxheT0iaW5saW5lIiBvcGFjaXR5PSIwLjMiIGZpbGw9Im5vbmUiIHN0cm9rZT0iIzQ0OUZEQiIgZW5hYmxlLWJhY2tncm91bmQ9Im5ldyAgICAiIHgxPSI0MTIiIHkxPSItMjcxLjQiIHgyPSI2MTIiIHkyPSItMjcxLjQiLz48bGluZSBkaXNwbGF5PSJpbmxpbmUiIGZpbGw9Im5vbmUiIHN0cm9rZT0iIzQ0OUZEQiIgeDE9IjQxMiIgeTE9Ii0yNjguMiIgeDI9IjYxMiIgeTI9Ii0yNjguMiIvPjxsaW5lIGRpc3BsYXk9ImlubGluZSIgb3BhY2l0eT0iMC4zIiBmaWxsPSJub25lIiBzdHJva2U9IiM0NDlGREIiIGVuYWJsZS1iYWNrZ3JvdW5kPSJuZXcgICAgIiB4MT0iNDEyIiB5MT0iLTI2NS4xIiB4Mj0iNjEyIiB5Mj0iLTI2NS4xIi8+PGxpbmUgZGlzcGxheT0iaW5saW5lIiBmaWxsPSJub25lIiBzdHJva2U9IiM0NDlGREIiIHgxPSI0MTIiIHkxPSItMjYyIiB4Mj0iNjEyIiB5Mj0iLTI2MiIvPjxsaW5lIGRpc3BsYXk9ImlubGluZSIgb3BhY2l0eT0iMC4zIiBmaWxsPSJub25lIiBzdHJva2U9IiM0NDlGREIiIGVuYWJsZS1iYWNrZ3JvdW5kPSJuZXcgICAgIiB4MT0iNDEyIiB5MT0iLTI1OC45IiB4Mj0iNjEyIiB5Mj0iLTI1OC45Ii8+PGxpbmUgZGlzcGxheT0iaW5saW5lIiBmaWxsPSJub25lIiBzdHJva2U9IiM0NDlGREIiIHgxPSI0MTIiIHkxPSItMjU1LjgiIHgyPSI2MTIiIHkyPSItMjU1LjgiLz48bGluZSBkaXNwbGF5PSJpbmxpbmUiIG9wYWNpdHk9IjAuMyIgZmlsbD0ibm9uZSIgc3Ryb2tlPSIjNDQ5RkRCIiBlbmFibGUtYmFja2dyb3VuZD0ibmV3ICAgICIgeDE9IjQxMiIgeTE9Ii0yNTIuNiIgeDI9IjYxMiIgeTI9Ii0yNTIuNiIvPjxsaW5lIGRpc3BsYXk9ImlubGluZSIgZmlsbD0ibm9uZSIgc3Ryb2tlPSIjNDQ5RkRCIiB4MT0iNDEyIiB5MT0iLTI0OS41IiB4Mj0iNjEyIiB5Mj0iLTI0OS41Ii8+PGxpbmUgZGlzcGxheT0iaW5saW5lIiBvcGFjaXR5PSIwLjMiIGZpbGw9Im5vbmUiIHN0cm9rZT0iIzQ0OUZEQiIgZW5hYmxlLWJhY2tncm91bmQ9Im5ldyAgICAiIHgxPSI0MTIiIHkxPSItMjQ2LjQiIHgyPSI2MTIiIHkyPSItMjQ2LjQiLz48bGluZSBkaXNwbGF5PSJpbmxpbmUiIGZpbGw9Im5vbmUiIHN0cm9rZT0iIzQ0OUZEQiIgeDE9IjQxMiIgeTE9Ii0yNDMuMiIgeDI9IjYxMiIgeTI9Ii0yNDMuMiIvPjxsaW5lIGRpc3BsYXk9ImlubGluZSIgb3BhY2l0eT0iMC4zIiBmaWxsPSJub25lIiBzdHJva2U9IiM0NDlGREIiIGVuYWJsZS1iYWNrZ3JvdW5kPSJuZXcgICAgIiB4MT0iNDEyIiB5MT0iLTI0MC4xIiB4Mj0iNjEyIiB5Mj0iLTI0MC4xIi8+PGxpbmUgZGlzcGxheT0iaW5saW5lIiBmaWxsPSJub25lIiBzdHJva2U9IiM0NDlGREIiIHgxPSI0MTIiIHkxPSItMjM3IiB4Mj0iNjEyIiB5Mj0iLTIzNyIvPjxsaW5lIGRpc3BsYXk9ImlubGluZSIgb3BhY2l0eT0iMC4zIiBmaWxsPSJub25lIiBzdHJva2U9IiM0NDlGREIiIGVuYWJsZS1iYWNrZ3JvdW5kPSJuZXcgICAgIiB4MT0iNDEyIiB5MT0iLTIzMy45IiB4Mj0iNjEyIiB5Mj0iLTIzMy45Ii8+PGxpbmUgZGlzcGxheT0iaW5saW5lIiBmaWxsPSJub25lIiBzdHJva2U9IiM0NDlGREIiIHgxPSI0MTIiIHkxPSItMjMwLjgiIHgyPSI2MTIiIHkyPSItMjMwLjgiLz48bGluZSBkaXNwbGF5PSJpbmxpbmUiIG9wYWNpdHk9IjAuMyIgZmlsbD0ibm9uZSIgc3Ryb2tlPSIjNDQ5RkRCIiBlbmFibGUtYmFja2dyb3VuZD0ibmV3ICAgICIgeDE9IjQxMiIgeTE9Ii0yMjcuNiIgeDI9IjYxMiIgeTI9Ii0yMjcuNiIvPjxsaW5lIGRpc3BsYXk9ImlubGluZSIgZmlsbD0ibm9uZSIgc3Ryb2tlPSIjNDQ5RkRCIiB4MT0iNDEyIiB5MT0iLTIyNC41IiB4Mj0iNjEyIiB5Mj0iLTIyNC41Ii8+PGxpbmUgZGlzcGxheT0iaW5saW5lIiBvcGFjaXR5PSIwLjMiIGZpbGw9Im5vbmUiIHN0cm9rZT0iIzQ0OUZEQiIgZW5hYmxlLWJhY2tncm91bmQ9Im5ldyAgICAiIHgxPSI0MTIiIHkxPSItMjIxLjQiIHgyPSI2MTIiIHkyPSItMjIxLjQiLz48bGluZSBkaXNwbGF5PSJpbmxpbmUiIGZpbGw9Im5vbmUiIHN0cm9rZT0iIzQ0OUZEQiIgeDE9IjQxMiIgeTE9Ii0yMTguMiIgeDI9IjYxMiIgeTI9Ii0yMTguMiIvPjxsaW5lIGRpc3BsYXk9ImlubGluZSIgb3BhY2l0eT0iMC4zIiBmaWxsPSJub25lIiBzdHJva2U9IiM0NDlGREIiIGVuYWJsZS1iYWNrZ3JvdW5kPSJuZXcgICAgIiB4MT0iNDEyIiB5MT0iLTIxNS4xIiB4Mj0iNjEyIiB5Mj0iLTIxNS4xIi8+PC9nPjxwYXRoIGZpbGw9IiM5RUEzQTgiIHN0cm9rZT0iIzlFQTNBOCIgc3Ryb2tlLXdpZHRoPSIxMSIgZD0iTTE4MS40LDUwLjdsLTY1LTM2LjdjLTguOS01LTI0LjEtNS0zMi45LDBsLTY1LDM2LjdjLTUsMi44LTcuNyw2LjctNy43LDExLjFzMi43LDguMyw3LjcsMTEuMWw2NSwzNi43YzQuNCwyLjUsMTAuMywzLjksMTYuNSwzLjlzMTItMS40LDE2LjUtMy45bDY1LTM2LjdjNS0yLjgsNy43LTYuNyw3LjctMTEuMVMxODYuMyw1My41LDE4MS40LDUwLjdMMTgxLjQsNTAuN3ogTTE3OC40LDY3LjZsLTY1LDM2LjdjLTcsMy45LTIwLDQtMjcsMGwtNjUtMzYuN2MtMy0xLjctNC42LTMuOC00LjYtNS44YzAtMiwxLjctNC4yLDQuNi01LjhsNjUtMzYuN2MzLjUtMiw4LjQtMy4xLDEzLjUtMy4xYzUuMSwwLDEwLDEuMSwxMy41LDMuMWw2NSwzNi43YzMsMS43LDQuNiwzLjgsNC42LDUuOEMxODMuMSw2My44LDE4MS40LDY1LjksMTc4LjQsNjcuNnogTTE4MS40LDg5LjJjLTEuNC0wLjgtMy4zLTAuMy00LjEsMS4xYy0wLjgsMS40LTAuMywzLjMsMS4xLDQuMWMzLDEuNyw0LjYsMy44LDQuNiw1LjhzLTEuNyw0LjItNC42LDUuOGwtNjUsMzYuN2MtNy4zLDQuMS0xOS43LDQuMS0yNywwbC02NS0zNi43Yy0zLTEuNy00LjYtMy44LTQuNi01LjhzMS43LTQuMiw0LjYtNS44YzEuNC0wLjgsMi0yLjcsMS4xLTQuMWMtMC44LTEuNS0yLjctMi00LjEtMS4xYy01LDIuOC03LjcsNi43LTcuNywxMS4xczIuNyw4LjMsNy43LDExLjFsNjUsMzYuN0M4OCwxNTAuNyw5NCwxNTIsOTkuOSwxNTJzMTEuOS0xLjMsMTYuNS0zLjlsNjUtMzYuN2M1LTIuOCw3LjctNi43LDcuNy0xMS4xQzE4OS4xLDk2LDE4Ni4zLDkyLDE4MS40LDg5LjJMMTgxLjQsODkuMnogTTE4MS40LDEyN2MtMS40LTAuOC0zLjMtMC4zLTQuMSwxLjFjLTAuOCwxLjQtMC4zLDMuMywxLjEsNC4xYzMsMS43LDQuNiwzLjgsNC42LDUuOGMwLDItMS43LDQuMi00LjYsNS44bC02NSwzNi43Yy03LjMsNC4xLTE5LjcsNC4xLTI3LDBsLTY1LTM2LjdjLTMtMS43LTQuNi0zLjgtNC42LTUuOGMwLTIsMS43LTQuMiw0LjYtNS44YzEuNC0wLjgsMi0yLjcsMS4xLTQuMWMtMC44LTEuNC0yLjctMi00LjEtMS4xYy01LDIuOC03LjcsNi43LTcuNywxMS4xYzAsNC4zLDIuNyw4LjMsNy43LDExLjFsNjUsMzYuN2M0LjYsMi42LDEwLjUsMy45LDE2LjUsMy45czExLjktMS4zLDE2LjUtMy45bDY1LTM2LjdjNS0yLjgsNy43LTYuNyw3LjctMTEuMUMxODkuMSwxMzMuNywxODYuMywxMjkuOCwxODEuNCwxMjdMMTgxLjQsMTI3eiIvPjwvc3ZnPg==', 4);
        add_submenu_page('lerp-system-status', 'UNCODE', esc_html__('系统状态', 'lerp'), 'administrator', 'lerp-system-status', 'lerp_welcome_page');
    }
}

add_action('admin_menu', 'lerp_admin_menu');

/**
 * Remove top margin for admin bar
 */
function lerp_remove_adminbar_margin()
{
    remove_action('wp_head', '_admin_bar_bump_cb');
}

add_action('get_header', 'lerp_remove_adminbar_margin');

if ( is_admin() && isset($_GET['activated']) && $pagenow == "themes.php" ) {
    header('Location: ' . admin_url() . 'admin.php?page=lerp-system-status&first=true');
}

function lerp_ot_admin_script()
{
    wp_enqueue_script('lerp-ot-admin', get_template_directory_uri() . '/core/assets/js/min/ot-admin-extended.min.js', array('ot-admin-js'), UNCODE_VERSION, false);
    wp_enqueue_script('ot-admin-fontpicker', get_template_directory_uri() . '/core/assets/js/min/jquery.fonticonpicker.min.js', array('ot-admin-js'), UNCODE_VERSION, false);
}

add_action('ot_admin_scripts_after', 'lerp_ot_admin_script');

function lerp_load_admin_script()
{
    wp_enqueue_script('admin_lerp_js', get_template_directory_uri() . '/core/assets/js/min/admin_lerp.min.js', array('jquery', 'jquery-ui-tabs', 'jquery-ui-dialog'), UNCODE_VERSION, true);
    wp_enqueue_style('wp-jquery-ui-dialog');
    wp_enqueue_script('jquery-tiptip', get_template_directory_uri() . '/core/assets/js/min/jquery.tipTip.min.js', array('jquery'), UNCODE_VERSION, true);

    // Get media categories (used for the Media Upload dropdown filter)
    $terms = get_terms('media-category', array(
        'orderby' => 'name',
        'order' => 'ASC',
        'hide_empty' => true,
    ));

    $site_parameters = array(
        'OT_PATH' => OT_URL,
        'theme_directory' => get_template_directory_uri(),
        'admin_ajax' => admin_url('admin-ajax.php'),
        'ajax_save_message' => array(
            'success' => esc_html__('主题设置已保存。', 'lerp'),
            'error' => esc_html__('主题设置未保存。', 'lerp'),
        ),
        'http_errors' => array(
            '400' => esc_html__(' Error: 400 - Request content was invalid.', 'lerp'),
            '401' => esc_html__(' Error: 401 - Unauthorized access.', 'lerp'),
            '403' => esc_html__(' Error: 403 - Forbidden resource can\'t be accessed.', 'lerp'),
            '404' => esc_html__(' Error: 404 - Requested page not found.', 'lerp'),
            '408' => esc_html__(' Error: 408 - Request time out.', 'lerp'),
            '500' => esc_html__(' Error: 500 - Internal server error.', 'lerp'),
            '503' => esc_html__(' Error: 503 - Service unavailable.', 'lerp'),
            'login' => esc_html__(' Your session has expired.', 'lerp'),
            'unknown' => esc_html__(' Unknown error.', 'lerp')
        ),
        'modal_buttons' => array(
            'cancel' => esc_html__('Cancel', 'lerp'),
            'confirm' => esc_html__('Confirm', 'lerp'),
        ),
        'media_cats' => array(
            'all_label' => esc_html__('All Media Categories', 'lerp'),
            'terms' => $terms,
        )
    );
    wp_localize_script('admin_lerp_js', 'SiteParameters', $site_parameters);
}

add_action('admin_enqueue_scripts', 'lerp_load_admin_script');

function lerp_init_admin_css()
{
    $production_mode = ot_get_option('_lerp_production');
    $resources_version = ($production_mode === 'on') ? null : rand();
    wp_enqueue_style('ot-admin', get_template_directory_uri() . '/core/theme-options/assets/css/ot-admin.css', false, $resources_version);
    wp_enqueue_style('admin-lerp-icons', get_template_directory_uri() . '/lib/assets/css/lerp-icons.css', false, $resources_version);
    $back_css = get_template_directory() . '/core/assets/css/';
    $ot_id = is_multisite() ? get_current_blog_id() : '';
    if ( file_exists($back_css . 'admin-custom' . $ot_id . '.css') && wp_is_writable($back_css . 'admin-custom' . $ot_id . '.css') ) {
        wp_enqueue_style('lerp-custom-style', get_template_directory_uri() . '/core/assets/css/admin-custom' . $ot_id . '.css', false, $resources_version);
    } else {
        $styles = lerp_create_dynamic_css();
        wp_add_inline_style('ot-admin', lerp_compress_css_inline($styles['admin']));
    }
    $fonts = get_option('lerp_font_options');
    if ( isset($fonts['font_stack']) && $fonts['font_stack'] !== '[]' ) {

        $upload_dir = wp_upload_dir();
        $site_url = get_option('upload_url_path');
        $scheme = parse_url($site_url, PHP_URL_SCHEME);
        $upload_dir_url = set_url_scheme($upload_dir['baseurl'], $scheme);

        if ( @file_exists(trailingslashit($upload_dir['basedir']) . 'lerp-fonts/lerpfont.css') ) wp_enqueue_style('uf-font-squirrel', $upload_dir_url . '/lerp-fonts/lerpfont.css', false, $resources_version);
    }
}

add_action('admin_init', 'lerp_init_admin_css');

function lerp_register_admin_js()
{
    $i18nLocale = array(
        'add_media' => esc_html__('Add Media', 'lerp'),
        'add_medias' => esc_html__('Add Medias', 'lerp'),
        'select_media' => esc_html__('Media selection', 'lerp'),
        'select_medias' => esc_html__('Medias selection', 'lerp'),
        'all_medias' => esc_html__('All medias', 'lerp'),
    );
    wp_localize_script('vc-backend-actions-js', 'i18nLocaleLerp', $i18nLocale);
}

add_action('vc_base_register_admin_js', 'lerp_register_admin_js');

//////////////////
// MIME helper //
//////////////////

function lerp_modify_post_mime_types($post_mime_types)
{
    $post_mime_types['oembed/vimeo'] = array(esc_html__('Vimeo', 'lerp'), esc_html__('Manage Vimeos', 'lerp'), _n_noop('Vimeo <span class="count">(%s)</span>', 'Vimeos <span class="count">(%s)</span>', 'lerp'));
    $post_mime_types['oembed/youtube'] = array(esc_html__('Youtube', 'lerp'), esc_html__('Manage Youtubes', 'lerp'), _n_noop('Youtube <span class="count">(%s)</span>', 'Youtubes <span class="count">(%s)</span>', 'lerp'));
    $post_mime_types['oembed/soundcloud'] = array(esc_html__('Soundcloud', 'lerp'), esc_html__('Manage Soundclouds', 'lerp'), _n_noop('Soundcloud <span class="count">(%s)</span>', 'Soundclouds <span class="count">(%s)</span>', 'lerp'));
    $post_mime_types['oembed/spotify'] = array(esc_html__('Spotify', 'lerp'), esc_html__('Manage Spotifys', 'lerp'), _n_noop('Spotify <span class="count">(%s)</span>', 'Spotifys <span class="count">(%s)</span>', 'lerp'));
    $post_mime_types['oembed/facebook'] = array(esc_html__('Facebook', 'lerp'), esc_html__('Manage Facebooks', 'lerp'), _n_noop('Facebook <span class="count">(%s)</span>', 'Facebooks <span class="count">(%s)</span>', 'lerp'));
    $post_mime_types['oembed/twitter'] = array(esc_html__('Twitter', 'lerp'), esc_html__('Manage Tweets', 'lerp'), _n_noop('Twitter <span class="count">(%s)</span>', 'Tweets <span class="count">(%s)</span>', 'lerp'));
    $post_mime_types['oembed/flickr'] = array(esc_html__('Flickr', 'lerp'), esc_html__('Manage Flickrs', 'lerp'), _n_noop('Flickr <span class="count">(%s)</span>', 'Flickrs <span class="count">(%s)</span>', 'lerp'));
    $post_mime_types['oembed/instagram'] = array(esc_html__('Instagram', 'lerp'), esc_html__('Manage Instagrams', 'lerp'), _n_noop('Instagram <span class="count">(%s)</span>', 'Instagrams <span class="count">(%s)</span>', 'lerp'));
    $post_mime_types['oembed/svg'] = array(esc_html__('SVG', 'lerp'), esc_html__('Manage SVGs', 'lerp'), _n_noop('SVG <span class="count">(%s)</span>', 'SVGs <span class="count">(%s)</span>', 'lerp'));
    $post_mime_types['oembed/html'] = array(esc_html__('HTML', 'lerp'), esc_html__('Manage HTMLs', 'lerp'), _n_noop('HTML <span class="count">(%s)</span>', 'HTMLs <span class="count">(%s)</span>', 'lerp'));
    $post_mime_types['oembed/iframe'] = array(esc_html__('iFrame', 'lerp'), esc_html__('Manage iFrames', 'lerp'), _n_noop('iFrame <span class="count">(%s)</span>', 'iFrames <span class="count">(%s)</span>', 'lerp'));
    return $post_mime_types;
}

add_filter('post_mime_types', 'lerp_modify_post_mime_types');

function lerp_mime_types($mimes)
{
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
}

add_filter('upload_mimes', 'lerp_mime_types');

add_filter('wp_check_filetype_and_ext', 'fix_mime_type_svg', 75, 4);

function fix_mime_type_svg($data = null, $file = null, $filename = null, $mimes = null)
{
    $ext = isset($data['ext']) ? $data['ext'] : '';
    if ( strlen($ext) < 1 ) {
        $ext = strtolower(end(explode('.', $filename)));
    }
    if ( $ext === 'svg' ) {
        $data['type'] = 'image/svg+xml';
        $data['ext'] = 'svg';
    }
    return $data;
}

////////////////////////////////////
// Media library additional fields //
////////////////////////////////////

function lerp_add_additional_fields($form_fields, $post)
{
    // Don't show fields on gallery attachments
    if ( $post->post_mime_type == 'oembed/gallery' ) {
        return $form_fields;
    }

    $team = (bool)get_post_meta($post->ID, "_lerp_team_member", true);
    $social_original = (bool)get_post_meta($post->ID, "_lerp_social_original", true);
    $animated_svg = (bool)get_post_meta($post->ID, "_lerp_animated_svg", true);
    $animated_svg_time = get_post_meta($post->ID, "_lerp_animated_svg_time", true);
    $team_social = get_post_meta($post->ID, "_lerp_team_member_social", true);
    $poster = get_post_meta($post->ID, "_lerp_poster_image", true);
    $video_loop = (bool)get_post_meta($post->ID, "_lerp_video_loop", true);
    $video_auto = (bool)get_post_meta($post->ID, "_lerp_video_autoplay", true);
    $videos = get_post_meta($post->ID, "_lerp_video_alternative", true);
    $video1 = isset($videos[0]) ? $videos[0] : '';
    $video2 = isset($videos[1]) ? $videos[1] : '';

    $checked_team = ($team) ? 'checked="checked"' : '';
    $checked_social = ($social_original) ? 'checked="checked"' : '';
    $checked_animated = ($animated_svg) ? 'checked="checked"' : '';
    $checked_loop = ($video_loop) ? 'checked="checked"' : '';
    $checked_auto = ($video_auto) ? 'checked="checked"' : '';

    if ( $post->post_mime_type === 'oembed/svg' ) {
        $alt = get_post_meta($post->ID, '_wp_attachment_image_alt', true);
        if ( empty($alt) )
            $alt = '';
        $form_fields['svg_alt'] = array(
            'value' => $alt,
            'label' => esc_html__('Alt Text', 'lerp'),
        );
    }

    if ( strpos($post->post_mime_type, 'image') === false || $post->post_mime_type === 'image/svg+xml' ) {
        $dimensions = get_post_meta($post->ID, "_wp_attachment_metadata", true);
        if ( !empty($dimensions) ) {
            $width = isset($dimensions['width']) ? $dimensions['width'] : 1;
            $height = isset($dimensions['height']) ? $dimensions['height'] : 1;
        } else {
            $width = 1;
            $height = 1;
        }

        $form_fields["media_width"] = array(
            "label" => esc_html__("Width", 'lerp'),
            "value" => $width
        );
        $form_fields["media_height"] = array(
            "label" => esc_html__("Height", 'lerp'),
            "value" => $height
        );
        $form_fields["poster_image"] = array(
            "label" => esc_html__("Media Poster (Image ID)", 'lerp'),
            "value" => $poster,
        );
    }

    if ( strpos($post->post_mime_type, 'video/') !== false ) {
        $form_fields["video_loop"] = array(
            "label" => esc_html__("Loop?", 'lerp'),
            "input" => 'html',
            "html" => "<input type='checkbox' {$checked_loop}  name='attachments[{$post->ID}][video_loop]' id='attachments[{$post->ID}][video_loop]' /> <span>Yes</span>",
            "value" => $video_loop
        );
        $form_fields["video_auto"] = array(
            "label" => esc_html__("Autoplay?", 'lerp'),
            "input" => 'html',
            "html" => "<input type='checkbox' {$checked_auto}  name='attachments[{$post->ID}][video_autoplay]' id='attachments[{$post->ID}][video_autoplay]' /> <span>Yes</span>",
            "value" => $video_auto
        );
        $form_fields["video_alt_1"] = array(
            "label" => esc_html__("Alternative video source 1", 'lerp'),
            "value" => $video1,
        );
        $form_fields["video_alt_2"] = array(
            "label" => esc_html__("Alternative video source 2", 'lerp'),
            "value" => $video2,
        );
    }

    if ( strpos($post->post_mime_type, 'oembed/svg') !== false || $post->post_mime_type === 'image/svg+xml' ) {
        $form_fields["animated_svg"] = array(
            "label" => esc_html__("Animated?", 'lerp'),
            "input" => 'html',
            "html" => "<input type='checkbox' {$checked_animated}  name='attachments[{$post->ID}][animated_svg]' id='attachments[{$post->ID}][animated_svg]' /> <span>Yes</span>",
            "value" => $animated_svg
        );
    }

    if ( $animated_svg ) {
        $form_fields["animated_svg_time"] = array(
            "label" => esc_html__("Animation time (default 100)", 'lerp'),
            "input" => 'html',
            "html" => "<input type='text' value='" . $animated_svg_time . "' name='attachments[{$post->ID}][animated_svg_time]' id='attachments[{$post->ID}][animated_svg_time]' /><br />"
        );
    }

    if ( strpos($post->post_mime_type, 'image') !== false ) {
        $form_fields["media_id"] = array(
            "label" => esc_html__("ID", 'lerp'),
            "input" => 'html',
            "html" => '<input type="text" value="' . $post->ID . '" readonly=""><br />'
        );
    }

    if ( $post->post_mime_type === 'oembed/twitter' ) {
        $form_fields["social_original"] = array(
            "label" => esc_html__("Twitter original", 'lerp'),
            "input" => 'html',
            "html" => "<input type='checkbox' {$checked_social} name='attachments[{$post->ID}][social_original]' id='attachments[{$post->ID}][social_original]' /> <span>Yes</span>",
            "value" => $social_original
        );
    }

    $form_fields["team_member"] = array(
        "label" => esc_html__("Team member?", 'lerp'),
        "input" => 'html',
        "html" => "<input type='checkbox' {$checked_team} name='attachments[{$post->ID}][team_member]' id='attachments[{$post->ID}][team_member]' /> <span>Yes</span>",
        "value" => $team
    );

    if ( $team ) {
        $form_fields["team_member_social"] = array(
            "label" => esc_html__("Socials", 'lerp'),
            "input" => 'textarea',
            "value" => $team_social
        );
    }

    $taxonomies = apply_filters('media-taxonomies', get_object_taxonomies('attachment', 'objects'));

    if ( !$taxonomies )
        return $form_fields;

    foreach ( $taxonomies as $taxonomyname => $taxonomy ) :
        $form_fields[$taxonomyname] = array(
            'label' => $taxonomy->labels->singular_name,
            'input' => 'html',
            'html' => lerp_terms_checkboxes($taxonomy, $post->ID),
            'show_in_edit' => true,
        );
    endforeach;

    return $form_fields;
}

function lerp_save_additional_fields($attachment_id)
{

    if ( isset($_REQUEST['action']) && $_REQUEST['action'] == 'save-attachment-compat' ) {

        if ( isset($_REQUEST['attachments'][$attachment_id]['svg_alt']) ) {
            $alt_text = $_REQUEST['attachments'][$attachment_id]['svg_alt'];
            update_post_meta($attachment_id, '_wp_attachment_image_alt', $alt_text);
        }

        if ( isset($_REQUEST['attachments'][$attachment_id]['team_member']) ) {
            $team = ($_REQUEST['attachments'][$attachment_id]['team_member'] == 'on') ? '1' : '0';
            update_post_meta($attachment_id, '_lerp_team_member', $team);
        } else {
            delete_post_meta($attachment_id, '_lerp_team_member', '1');
        }

        if ( isset($_REQUEST['attachments'][$attachment_id]['social_original']) ) {
            $social_original = ($_REQUEST['attachments'][$attachment_id]['social_original'] == 'on') ? '1' : '0';
            update_post_meta($attachment_id, '_lerp_social_original', $social_original);
        } else {
            delete_post_meta($attachment_id, '_lerp_social_original', '1');
        }

        if ( isset($_REQUEST['attachments'][$attachment_id]['animated_svg']) ) {
            $animated = ($_REQUEST['attachments'][$attachment_id]['animated_svg'] == 'on') ? '1' : '0';
            update_post_meta($attachment_id, '_lerp_animated_svg', $animated);
        } else {
            delete_post_meta($attachment_id, '_lerp_animated_svg', '1');
        }

        if ( isset($_REQUEST['attachments'][$attachment_id]['animated_svg_time']) ) {
            $animated_svg_time = $_REQUEST['attachments'][$attachment_id]['animated_svg_time'];
            update_post_meta($attachment_id, '_lerp_animated_svg_time', $animated_svg_time);
        } else {
            delete_post_meta($attachment_id, '_lerp_animated_svg_time');
        }

        if ( isset($_REQUEST['attachments'][$attachment_id]['video_loop']) ) {
            $video_loop = ($_REQUEST['attachments'][$attachment_id]['video_loop'] == 'on') ? '1' : '0';
            update_post_meta($attachment_id, '_lerp_video_loop', $video_loop);
        } else {
            delete_post_meta($attachment_id, '_lerp_video_loop', '1');
        }

        if ( isset($_REQUEST['attachments'][$attachment_id]['video_autoplay']) ) {
            $video_auto = ($_REQUEST['attachments'][$attachment_id]['video_autoplay'] == 'on') ? '1' : '0';
            update_post_meta($attachment_id, '_lerp_video_autoplay', $video_auto);
        } else {
            delete_post_meta($attachment_id, '_lerp_video_autoplay', '1');
        }

        if ( isset($_REQUEST['attachments'][$attachment_id]['team_member_social']) && isset($_REQUEST['attachments'][$attachment_id]['team_member_social']) !== '' ) {
            $team_social = $_REQUEST['attachments'][$attachment_id]['team_member_social'];
            update_post_meta($attachment_id, '_lerp_team_member_social', $team_social);
        }

        if ( isset($_REQUEST['attachments'][$attachment_id]['media_width']) && isset($_REQUEST['attachments'][$attachment_id]['media_width']) !== '' && isset($_REQUEST['attachments'][$attachment_id]['media_height']) && isset($_REQUEST['attachments'][$attachment_id]['media_height']) !== '' ) {
            $dimensions = array('width' => $_REQUEST['attachments'][$attachment_id]['media_width'], 'height' => $_REQUEST['attachments'][$attachment_id]['media_height']);
            update_post_meta($attachment_id, '_wp_attachment_metadata', $dimensions);
        }

        if ( isset($_REQUEST['attachments'][$attachment_id]['poster_image']) && $_REQUEST['attachments'][$attachment_id]['poster_image'] !== '' ) {
            $poster = $_REQUEST['attachments'][$attachment_id]['poster_image'];
            update_post_meta($attachment_id, '_lerp_poster_image', $poster);
        } else {
            delete_post_meta($attachment_id, '_lerp_poster_image');
        }

        if ( !isset($_REQUEST['attachments'][$attachment_id]['video_alt_1']) && !isset($_REQUEST['attachments'][$attachment_id]['video_alt_2']) ) {
            delete_post_meta($attachment_id, '_lerp_video_alternative');
        } else {
            $alt_array = array();
            $alt_array[] = $_REQUEST['attachments'][$attachment_id]['video_alt_1'];
            $alt_array[] = $_REQUEST['attachments'][$attachment_id]['video_alt_2'];
            update_post_meta($attachment_id, '_lerp_video_alternative', $alt_array);
        }

        if ( isset($_REQUEST['changes']) ) {
            $changes = $_REQUEST['changes'];

            if ( isset($changes['url']) && isset($_REQUEST['id']) && $_REQUEST['id'] !== '' ) {
                global $wpdb;
                $id = esc_sql($_REQUEST['id']);
                $code = esc_sql($changes['url']);
                $update = $wpdb->query($wpdb->prepare("UPDATE $wpdb->posts SET guid = %s WHERE ID = %d", $code, $id));
            }
        }

    }

}

add_action('edit_attachment', 'lerp_save_additional_fields');

function lerp_terms_checkboxes($taxonomy, $post_id)
{
    if ( !is_object($taxonomy) ) :
        $taxonomy = get_taxonomy($taxonomy);
    endif;
    $terms = get_terms($taxonomy->name, array(
        'hide_empty' => FALSE,
    ));
    $attachment_terms = wp_get_object_terms($post_id, $taxonomy->name, array(
        'fields' => 'ids'
    ));
    ob_start();
    ?>
    <div class="media-term-section">

        <div class="media-terms" data-id="<?php echo $post_id ?>" data-taxonomy="<?php echo $taxonomy->name ?>">

            <ul>
                <?php
                wp_terms_checklist(0, array(
                    'selected_cats' => $attachment_terms,
                    'taxonomy' => $taxonomy->name,
                    'checked_ontop' => FALSE
                ));
                ?>
            </ul>

        </div><!-- .media-terms -->

        <a href="#" class="toggle-add-media-term taxonomy-add-new"><?php echo $taxonomy->labels->add_new_item ?></a>

        <div class="add-new-term">

            <input type="text" value="">

            <?php
            if ( 1 == $taxonomy->hierarchical ) :
                wp_dropdown_categories(array(
                    'taxonomy' => $taxonomy->name,
                    'class' => 'parent-' . $taxonomy->name,
                    'id' => 'parent-' . $taxonomy->name,
                    'name' => 'parent-' . $taxonomy->name,
                    'show_option_none' => '- ' . $taxonomy->labels->parent_item . ' -',
                    'hide_empty' => FALSE,
                ));
            endif;
            ?>

            <a class="button save-media-category" data-taxonomy="<?php echo $taxonomy->name ?>"
               data-id="<?php echo $post_id ?>"><?php echo $taxonomy->labels->add_new_item ?></a>

        </div><!-- .add-new-term -->

    </div><!-- .media-term-section -->

    <?php
    $output = ob_get_contents();
    ob_end_clean();
    return apply_filters('media-checkboxes', $output, $taxonomy, $terms);
}

add_filter("attachment_fields_to_edit", "lerp_add_additional_fields", 10, 2);

function lerp_save_media_terms()
{
    $post_id = intval($_REQUEST['attachment_id']);
    if ( !current_user_can('edit_post', $post_id) )
        die();
    $term_ids = array_map('intval', $_REQUEST['term_ids']);
    $response = wp_set_post_terms($post_id, $term_ids, sanitize_text_field($_REQUEST['taxonomy']));
    wp_update_term_count_now($term_ids, sanitize_text_field($_REQUEST['taxonomy']));
}

function lerp_add_media_term()
{
    $response = array();
    $attachment_id = intval($_REQUEST['attachment_id']);
    $taxonomy = get_taxonomy(sanitize_text_field($_REQUEST['taxonomy']));
    $parent = (intval($_REQUEST['parent']) > 0) ? intval($_REQUEST['parent']) : 0;
    // Check if term already exists
    $term = get_term_by('name', sanitize_text_field($_REQUEST['term']), $taxonomy->name);
    // No, so lets add it
    if ( !$term ) :
        $term = wp_insert_term(sanitize_text_field($_REQUEST['term']), $taxonomy->name, array('parent' => $parent));
        $term = get_term_by('id', $term['term_id'], $taxonomy->name);
    endif;
    // Connect attachment with term
    wp_set_object_terms($attachment_id, $term->term_id, $taxonomy->name, TRUE);
    $attachment_terms = wp_get_object_terms($attachment_id, $taxonomy->name, array(
        'fields' => 'ids'
    ));
    ob_start();
    wp_terms_checklist(0, array(
        'selected_cats' => $attachment_terms,
        'taxonomy' => $taxonomy->name,
        'checked_ontop' => FALSE
    ));
    $checklist = ob_get_contents();
    ob_end_clean();
    $response['checkboxes'] = $checklist;
    $response['selectbox'] = wp_dropdown_categories(array(
        'taxonomy' => $taxonomy->name,
        'class' => 'parent-' . $taxonomy->name,
        'id' => 'parent-' . $taxonomy->name,
        'name' => 'parent-' . $taxonomy->name,
        'show_option_none' => '- ' . $taxonomy->labels->parent_item . ' -',
        'hide_empty' => FALSE,
        'echo' => FALSE,
    ));
    die(json_encode($response));
}

add_action('wp_ajax_save-media-terms', 'lerp_save_media_terms', 0, 1);
add_action('wp_ajax_add-media-term', 'lerp_add_media_term', 0, 1);

function lerp_taxonomy_add_meta_field()
{
    /* create localized JS array */
    $localized_array = array(
        'upload_text' => apply_filters('ot_upload_text', esc_html__('Send to OptionTree', 'option-tree')),
        'remove_media_text' => esc_html__('Remove Media', 'option-tree'),
    );
    /* localized script attached to 'option_tree' */
    wp_localize_script('admin_lerp_js', 'option_tree', $localized_array);
    wp_enqueue_media();
    global $lerp_colors;
    $lerp_colors[0][1] = esc_html__('Select…', 'lerp');
    ?>
    <div class="form-field">
        <label for="term_meta[term_media]"><?php esc_html_e('Featured media', 'lerp'); ?></label>
        <div class="format-setting-inner">
            <div class="option-tree-ui-upload-parent">
                <input type="text" name="term_meta[term_media]" id="term_media" value=""
                       class="widefat option-tree-ui-upload-input " readonly="">
                <a href="javascript:void(0);" class="ot_upload_media option-tree-ui-button button button-primary light"
                   title="Add Media"><span class="icon fa fa-plus2"></span><?php esc_html_e('Add media', 'lerp'); ?>
                </a>
            </div>
        </div>
        <p class="description"
           style="padding-top: 22px;"><?php esc_html_e('Select a media assigned to the category.', 'lerp'); ?></p>
    </div>
    <div class="form-field">
        <label for="term_meta[term_color]"><?php esc_html_e('Color', 'lerp'); ?></label>
        <select name="term_meta[term_color]" id="term_meta[term_color]" class="term_color">
            <?php
            foreach ( $lerp_colors as $key => $value ) {
                ?>
                <option class="<?php echo esc_attr($value[0]); ?>"
                        value="<?php echo esc_attr($value[0]); ?>"><?php echo esc_html($value[1]); ?></option><?php
            }
            ?>
        </select>
        <p class="description"
           style="padding-top: 22px;"><?php esc_html_e('Select a color assigned to the category.', 'lerp'); ?></p>
    </div>
    <script type="text/javascript">
        jQuery(document).ready(function ($) {
            $('select.term_color').each(function (index) {
                var $select = $(this);
                if ($(this).is('[class*="_color"]') && window.navigator.userAgent.indexOf("Windows NT 10.0") == -1) {
                    $(this).easyDropDown({
                        cutOff: 10,
                    });
                }
            });
            $.fn.lerp_init_upload();
        });
    </script>
    <?php
}

add_action('category_add_form_fields', 'lerp_taxonomy_add_meta_field', 10, 2);
add_action('post_tag_add_form_fields', 'lerp_taxonomy_add_meta_field', 10, 2);

// Edit term page
function lerp_taxonomy_edit_meta_field($term)
{
    /* create localized JS array */
    $localized_array = array(
        'upload_text' => apply_filters('ot_upload_text', esc_html__('Send to OptionTree', 'option-tree')),
        'remove_media_text' => esc_html__('Remove Media', 'option-tree'),
    );
    /* localized script attached to 'option_tree' */
    wp_localize_script('admin_lerp_js', 'option_tree', $localized_array);
    wp_enqueue_media();
    global $lerp_colors;
    $lerp_colors[0][1] = esc_html__('Select…', 'lerp');
    // put the term ID into a variable
    $t_id = $term->term_id;

    // retrieve the existing value(s) for this meta field. This returns an array
    $term_meta = get_option("_lerp_taxonomy_$t_id");
    ?>
    <tr class="form-field">
        <th scope="row" valign="top"><label
                    for="term_meta[term_media]"><?php esc_html_e('Featured media', 'lerp'); ?></label></th>
        <td>
            <div class="format-setting-inner">
                <div class="option-tree-ui-upload-parent">
                    <input type="text" name="term_meta[term_media]" id="term_media"
                           value="<?php echo esc_attr($term_meta['term_media']); ?>"
                           class="widefat option-tree-ui-upload-input " readonly="">
                    <a href="javascript:void(0);"
                       class="ot_upload_media option-tree-ui-button button button-primary light" title="Add Media"><span
                                class="icon fa fa-plus2"></span><?php esc_html_e('Add media', 'lerp'); ?></a>
                </div>
            </div>
            <?php
            if ( $term_meta['term_media'] && wp_attachment_is_image($term_meta['term_media']) ) {
                $attachment_data = wp_get_attachment_image_src($term_meta['term_media'], 'original');
                /* check for attachment data */
                if ( $attachment_data ) {
                    $field_src = $attachment_data[0];
                }
                echo '<div class="option-tree-ui-media-wrap" id="term_media_media">';
                /* replace image src */
                if ( isset($field_src) )
                    $term_meta['term_media'] = $field_src;

                $post = get_post($term_meta['term_media']);
                if ( isset($post->post_mime_type) && $post->post_mime_type === 'oembed/svg' ) echo '<div class="option-tree-ui-image-wrap">' . $post->post_content . '</div>';
                else if ( preg_match('/\.(?:jpe?g|png|gif|ico)$/i', $term_meta['term_media']) )
                    echo '<div class="option-tree-ui-image-wrap"><img src="' . esc_url($term_meta['term_media']) . '" alt="" /></div>';
                else echo '<div class="option-tree-ui-image-wrap"><div class="option-tree-ui-image-wrap"><div class="oembed" onload="alert(\'load\');"><span class="spinner" style="display: block; float: left;"></span></div><div class="oembed_code" style="display: none;">' . esc_url($term_meta['term_media']) . '</div></div></div>';
                echo '<a href="#" class="option-tree-ui-remove-media option-tree-ui-button button button-secondary light" title="' . esc_html__('Remove Media', 'lerp') . '"><span class="icon fa fa-minus2"></span>' . esc_html__('Remove Media', 'lerp') . '</a>';
                echo '</div>';
            }
            ?>
            <p class="description"
               style="padding-top: 22px;"><?php esc_html_e('Select a media assigned to the category.', 'lerp'); ?></p>
        </td>
    </tr>
    <tr class="form-field">
        <th scope="row" valign="top"><label for="term_meta[term_color]"><?php esc_html_e('Color', 'lerp'); ?></label>
        </th>
        <td>
            <select name="term_meta[term_color]" id="term_meta[term_color]" class="term_color">
                <?php
                foreach ( $lerp_colors as $key => $value ) {
                    $selected = (isset($term_meta['term_color']) && $term_meta['term_color'] === $value[0]) ? ' selected="selected"' : '';
                    ?>
                    <option
                    class="<?php echo esc_attr($value[0]); ?>" value="<?php echo esc_attr($value[0]); ?>"<?php echo wp_kses_post($selected); ?>><?php echo esc_html($value[1]); ?></option><?php
                }
                ?>
            </select>
            <p class="description"
               style="padding-top: 22px;"><?php esc_html_e('Select a color assigned to the category.', 'lerp'); ?></p>
            <script type="text/javascript">
                jQuery(document).ready(function ($) {
                    $('select.term_color').each(function (index) {
                        var $select = $(this);
                        if ($(this).is('[class*="_color"]') && window.navigator.userAgent.indexOf("Windows NT 10.0") == -1) {
                            $(this).easyDropDown({
                                cutOff: 10,
                            });
                        }
                    });
                    $.fn.lerp_init_upload();
                });
            </script>
        </td>
    </tr>
    <?php
}

add_action('category_edit_form_fields', 'lerp_taxonomy_edit_meta_field', 10, 2);
add_action('post_tag_edit_form_fields', 'lerp_taxonomy_edit_meta_field', 10, 2);

// Save extra taxonomy fields callback function.
function lerp_save_taxonomy_custom_meta($term_id)
{
    if ( isset($_POST['term_meta']) ) {
        $t_id = $term_id;
        $term_meta = get_option("_lerp_taxonomy_$t_id");
        $cat_keys = array_keys($_POST['term_meta']);
        foreach ( $cat_keys as $key ) {
            if ( isset ($_POST['term_meta'][$key]) ) {
                $term_meta[$key] = $_POST['term_meta'][$key];
            }
        }
        // Save the option array.
        update_option("_lerp_taxonomy_$t_id", $term_meta);
    }
}

add_action('edited_category', 'lerp_save_taxonomy_custom_meta', 10, 2);
add_action('create_category', 'lerp_save_taxonomy_custom_meta', 10, 2);
add_action('edited_post_tag', 'lerp_save_taxonomy_custom_meta', 10, 2);
add_action('create_post_tag', 'lerp_save_taxonomy_custom_meta', 10, 2);


///////////////
// Menu edit //
///////////////

// add custom menu fields to menu
function lerp_add_custom_nav_fields($menu_item)
{
    $menu_item->icon = get_post_meta($menu_item->ID, '_menu_item_icon', true);
    $menu_item->megamenu = get_post_meta($menu_item->ID, '_menu_item_megamenu', true);
    $menu_item->button = get_post_meta($menu_item->ID, '_menu_item_button', true);
    return $menu_item;
}

function lerp_update_custom_nav_fields($menu_id, $menu_item_db_id, $args)
{

    // Check if element is properly sent
    if ( isset($_REQUEST['menu-item-icon']) && is_array($_REQUEST['menu-item-icon']) ) {
        $icon_value = (array_key_exists($menu_item_db_id, $_REQUEST['menu-item-icon'])) ? $_REQUEST['menu-item-icon'][$menu_item_db_id] : '';
        update_post_meta($menu_item_db_id, '_menu_item_icon', $icon_value);
    } else update_post_meta($menu_item_db_id, '_menu_item_icon', '');
    if ( isset($_REQUEST['menu-item-megamenu']) && is_array($_REQUEST['menu-item-megamenu']) ) {
        $megamenu_value = (array_key_exists($menu_item_db_id, $_REQUEST['menu-item-megamenu'])) ? $_REQUEST['menu-item-megamenu'][$menu_item_db_id] : '';
        update_post_meta($menu_item_db_id, '_menu_item_megamenu', $megamenu_value);
    } else update_post_meta($menu_item_db_id, '_menu_item_megamenu', '');
    if ( isset($_REQUEST['menu-item-button']) && is_array($_REQUEST['menu-item-button']) ) {
        $button_value = (array_key_exists($menu_item_db_id, $_REQUEST['menu-item-button'])) ? $_REQUEST['menu-item-button'][$menu_item_db_id] : '';
        update_post_meta($menu_item_db_id, '_menu_item_button', $button_value);
    } else update_post_meta($menu_item_db_id, '_menu_item_button', '');
}

function lerp_edit_walker()
{
    wp_enqueue_script('menu-iconpicker', get_template_directory_uri() . '/core/assets/js/menu-iconpicker.js', false, UNCODE_VERSION, false);
    wp_enqueue_script('menu-fontpicker', get_template_directory_uri() . '/core/assets/js/min/jquery.fonticonpicker.min.js', array('menu-iconpicker'), UNCODE_VERSION, false);
    return 'Walker_Nav_Menu_Edit_Custom';
}

add_filter('wp_setup_nav_menu_item', 'lerp_add_custom_nav_fields');
add_action('wp_update_nav_menu_item', 'lerp_update_custom_nav_fields', 10, 3);
add_filter('wp_edit_nav_menu_walker', 'lerp_edit_walker', 10);

require_once('edit_custom_walker.php');

///////////////////
// Media metabox //
///////////////////

function lerp_display_metabox()
{

    global $post;

    wp_enqueue_script('media_items_js', plugins_url('/lerp-core/vc_extend/assets/js/media_items.js'), array('jquery'));

    $ids = get_post_meta($post->ID, '_lerp_featured_media', 1);

    if ( function_exists('vc_editor_post_types') ) {
        $vc_post_type = vc_editor_post_types();
        if ( !in_array($post->post_type, $vc_post_type) ) $vc_message = esc_html__('Visual Composer is not active for this post type. Please activate it inside "Visual Composer > Role Manager"', 'lerp');
        else $vc_message = '';
    } else {
        $vc_message = esc_html__('Visual Composer is not active. Please activate it inside "Lerp > Install Plugins > Lerp Visual Composer"', 'lerp');
    }

    if ( $vc_message !== '' ) $vc_message = '<p class="notice notice-warning"><b>' . $vc_message . '</b></p>';

    ?>

    <input type="hidden" name="lerp_medias_noncedata" id="lerp_medias_noncedata"
           value="<?php echo wp_create_nonce('lerp_medias_noncedata'); ?>"/>

    <div class="edit_form_line">
        <input type="hidden" class="wpb_vc_param_value lerp_gallery_attached_images_ids medias media_element"
               name="medias" value="<?php echo esc_attr($ids); ?>">
        <div class="gallery_widget_site_images"></div>
        <?php echo $vc_message; ?>
        <a class="add_media_widget vc_btn vc_btn-sm vc_btn-primary add_media_widget--with-galleries" href="#"
           use-single="false" title="Add media"><?php esc_html_e('Select medias', 'lerp'); ?></a>
        <a href="#"
           class="vc_btn vc_btn-sm vc_btn-grey btn-remove-all"<?php if ( $ids === '' ) echo ' style="display:none;"'; ?>><?php esc_html_e('Remove All', 'lerp'); ?></a>
        <div class="lerp_widget_attached_images">
            <ul class="lerp_widget_attached_images_list">
                <?php echo(($ids != '' && function_exists('lerp_fieldAttachedMedia')) ? lerp_fieldAttachedMedia(explode(",", $ids)) : ''); ?>
            </ul>
            <div style="clear:both;"></div>
        </div>
    </div>

    <?php if ( $post->post_type != 'lerp_gallery' ) : ?>
    <?php
    $media_display = get_post_meta($post->ID, '_lerp_featured_media_display', 1);
    ?>
    <hr/>
    <div class="edit_form_line">
        <p>
            <strong><?php esc_html_e('Post media display', 'lerp') ?></strong>
            <label class="screen-reader-text"
                   for="media_display"><?php esc_html_e('Post media display', 'lerp') ?></label>
        </p>
        <p>
            <select name="media_display">
                <option value="carousel" <?php if ( isset ($media_display) ) selected($media_display, 'carousel'); ?>><?php esc_html_e('Carousel', 'lerp') ?></option>
                ';
                <option value="stack" <?php if ( isset ($media_display) ) selected($media_display, 'stack'); ?>><?php esc_html_e('Stack', 'lerp') ?></option>
                ';
                <option value="isotope" <?php if ( isset ($media_display) ) selected($media_display, 'isotope'); ?>><?php esc_html_e('Isotope', 'lerp') ?></option>
                ';
            </select>
        </p>
    </div>
<?php endif; ?>
    <?php
}

function lerp_register_metabox()
{
    $lerp_post_types = lerp_get_post_types(true);
    $lerp_post_types[] = 'lerp_gallery';

    foreach ( $lerp_post_types as $post_type ) {
        add_meta_box('lerp_gallery_div', esc_html__('媒体', 'lerp'), 'lerp_display_metabox', $post_type, 'normal', 'default');
    }
}

add_action('add_meta_boxes', 'lerp_register_metabox');

function lerp_save_media_metadata($post_id, $post)
{

    if ( empty($_POST['lerp_medias_noncedata']) ) {
        return;
    }

    if ( !wp_verify_nonce($_POST['lerp_medias_noncedata'], 'lerp_medias_noncedata') ) {
        return;
    }

    if ( !current_user_can('edit_post', $post->ID) ) {
        return;
    }

    $value_id = $_POST['medias'];
    $key_id = '_lerp_featured_media';

    $value_display = $_POST['media_display'];
    $key_display = '_lerp_featured_media_display';

    if ( $post->post_type == 'revision' ) {
        return;
    }

    if ( get_post_meta($post->ID, $key_id, FALSE) ) {
        update_post_meta($post->ID, $key_id, $value_id);
    } else {
        add_post_meta($post->ID, $key_id, $value_id);
    }
    if ( !$value_id ) {
        delete_post_meta($post->ID, $key_id);
    }

    if ( get_post_meta($post->ID, $key_display, FALSE) ) {
        update_post_meta($post->ID, $key_display, $value_display);
    } else {
        add_post_meta($post->ID, $key_display, $value_display);
    }
    if ( !$value_display ) {
        delete_post_meta($post->ID, $key_display);
    }

}

add_action('save_post', 'lerp_save_media_metadata', 1, 2);

/////////////////////////
// oEmbed Admin helper //
/////////////////////////

function lerp_admin_get_oembed()
{
    $code = $mime = '';
    $width = 1;
    $height = 1;
    $urlEnterd = isset($_REQUEST['urlOembed']) ? urldecode($_REQUEST['urlOembed']) : die();
    $onlycode = isset($_REQUEST['onlycode']) ? $_REQUEST['onlycode'] : false;

    $urlEnterd = str_replace('https://instagram.com', 'http://instagram.com', $urlEnterd);
    $WP_oembed = new WP_oEmbed();
    $raw_provider = parse_url($WP_oembed->get_provider($urlEnterd));

    if ( isset($raw_provider['host']) ) {
        $host = $raw_provider['host'];
        $strip = array(
            "www.",
            "api.",
            "embed.",
            "publish.",
        );
        $bare_host = str_replace($strip, "", $host);
        $bare_host = explode('.', $bare_host);

        $key = '=A';
        $key .= 'Iza';
        $key .= 'SyA9PE';
        $key .= 'tdNGSwzuM';
        $key .= '8QtaDbZvkc';
        $key .= 'Slkh_UG2HI';
        $key = 'key' . $key;

        $mime = 'oembed/' . $bare_host[0];

        $code = wp_oembed_get($urlEnterd);
        preg_match_all('/(width|height)=("[^"]*")/i', $code, $img_attr);
        if ( isset($img_attr[2][0]) ) $width = preg_replace('/\D/', '', $img_attr[2][0]);
        if ( isset($img_attr[2][1]) ) $height = preg_replace('/\D/', '', $img_attr[2][1]);

        if ( $bare_host[0] === 'youtube' ) {
            $parts = parse_url($urlEnterd);
            if ( isset($parts['query']) ) {
                parse_str($parts['query'], $query);
                if ( isset($query['v']) ) $idvideo = $query['v'];
                else {
                    $idvideo = $parts['path'];
                    $idvideo = str_replace('/', '', $idvideo);
                }
            } else {
                $idvideo = $parts['path'];
                $idvideo = str_replace('/', '', $idvideo);
            }
            $data = wp_remote_fopen("https://www.googleapis.com/youtube/v3/videos?part=snippet%2CcontentDetails&id=" . $idvideo . "&" . $key);
            $json = json_decode($data);
            $code = '<img src="' . $json->items[0]->snippet->thumbnails->default->url . '" />';
        } else if ( $bare_host[0] === 'vimeo' ) {
            $urlEnterd = preg_replace('/#.*/', '', $urlEnterd);
            $vimeo = unserialize(wp_remote_fopen("http://vimeo.com/api/v2/video/" . basename(strtok($urlEnterd, '?')) . ".php"));
            $code = '<img src="' . $vimeo[0]['thumbnail_large'] . '" />';
        } else if ( $bare_host[0] === 'flickr' ) {
            $code = preg_replace('/<\/?a[^>]*>/', '', $code);
        }
    } else {
        if ( preg_match('/(\.jpg|\.jpeg|\.png|\.bmp)$/i', $urlEnterd) || preg_match('/(\.jpg?|\.jpeg?|\.png?|\.bmp?)/i', $urlEnterd) || strpos($urlEnterd, 'imgix') !== false ) {
            $code = '<img src="' . $urlEnterd . '" />';
            $mime = 'image/url';
            if ( $onlycode == 'false' ) {
                if ( $getsize = @getimagesize($urlEnterd) ) {
                    if ( isset($getsize[0]) ) $width = $getsize[0];
                    if ( isset($getsize[1]) ) $height = $getsize[1];
                } else {
                    $width = 'indefinit';
                    $height = 'indefinit';
                }
            }
        } else {
            if ( strpos(strtolower($urlEnterd), '<iframe') !== false ) {
                $mime = 'oembed/iframe';
                preg_match_all('/(width|height)=("[^"]*")/i', $urlEnterd, $iframe_size);
                if ( isset($iframe_size[2][0]) ) {
                    preg_match("|\d+|", $iframe_size[2][0], $width);
                    $width = $width[0];
                }
                if ( isset($iframe_size[2][1]) ) {
                    preg_match("|\d+|", $iframe_size[2][1], $height);
                    $height = $height[0];
                }
            } else if ( strpos(strtolower($urlEnterd), '<svg') !== false ) {
                $mime = 'oembed/svg';
                preg_match_all('/(width|height)=("[^"]*")/i', $urlEnterd, $svg_size);
                if ( isset($svg_size[2][0]) ) {
                    preg_match("|\d+|", $svg_size[2][0], $width);
                    $width = $width[0];
                }
                if ( isset($svg_size[2][1]) ) {
                    preg_match("|\d+|", $svg_size[2][1], $height);
                    $height = $height[0];
                }
            } else $mime = 'oembed/html';
            $code = esc_html($urlEnterd);
        }
    }

    if ( $code == '' && $urlEnterd != '' ) $code = 'null';

    echo json_encode(array(
        'code' => $code,
        'mime' => $mime,
        'width' => $width,
        'height' => $height
    ));

    die();
}

function lerp_action_add_attachment($metadata, $attachment_id)
{
    $width = $height = '';
    $attachment = get_post($attachment_id);
    if ( $attachment && $attachment->post_mime_type === 'image/svg+xml' ) {
        global $wp_filesystem;
        if ( empty($wp_filesystem) ) {
            require_once(ABSPATH . '/wp-admin/includes/file.php');
            WP_Filesystem();
        }
        $xmlget = $wp_filesystem->get_contents($attachment->guid);
        preg_match_all('/(width|height)=("[^"]*")/i', $xmlget, $img_attr);
        if ( isset($img_attr[2][0]) ) $width = preg_replace('/\D/', '', $img_attr[2][0]);
        if ( isset($img_attr[2][1]) ) $height = preg_replace('/\D/', '', $img_attr[2][1]);
        if ( $width !== '' && $height !== '' ) {
            $metadata['width'] = (int)$width;
            $metadata['height'] = (int)$height;
        }
    }
    return $metadata;
}

add_filter('wp_generate_attachment_metadata', 'lerp_action_add_attachment', 10, 2);

//For logged in users
add_action('wp_ajax_get_oembed', 'lerp_admin_get_oembed');
//For logged out users
add_action('wp_ajax_nopriv_get_oembed', 'lerp_admin_get_oembed');

/////////////////////
// PHP Test Memory //
/////////////////////

/**
 * Memory limit test function.
 */
function lerp_php_test_memory()
{
    if ( defined('DOING_AJAX') && DOING_AJAX ) {
        for ( $i = 1; $i < 100; $i++ ) {
            $a = loadmem($i);
            echo '<div data-mb="' . $i . '" class="memory-mb"></div>';
            unset($a);
        }
        die();
    }
}

function loadmem($howmuchmeg)
{
    $a = str_repeat("0", $howmuchmeg * 1024 * 1024); // alocating 10 chars times million chars
    return $a;
}

/* AJAX call to test php memory */
add_action('wp_ajax_php_test_memory', 'lerp_php_test_memory');


///////////////////////////
// Adaptive Images Utils //
///////////////////////////

/**
 * AJAX utility function for get all the images.
 */
function lerp_list_images()
{

    if ( !function_exists('disk_free_space') ) {
        die();
    }

    $erase = (isset($_POST['erase']) && $_POST['erase'] === 'true') ? true : false;
    $query_images_args = array(
        'post_type' => 'attachment', 'post_mime_type' => 'image', 'post_status' => 'inherit', 'posts_per_page' => -1,
    );

    $query_images = new WP_Query($query_images_args);
    $images_block = array();
    $files = array();
    foreach ( $query_images->posts as $image ) {
        $filename = get_attached_file($image->ID);
        if ( $filename != '' ) {
            $extension_pos = strrpos($filename, '.');
            $filename_wildcard = substr($filename, 0, $extension_pos) . '*' . substr($filename, $extension_pos);
            $image_block = glob($filename_wildcard);
            if ( is_array($image_block) ) {
                foreach ( $image_block as $key => $image ) {
                    if ( strpos($image_block[$key], '-uai-') !== false ) {
                        if ( $erase ) unlink($image_block[$key]);
                        else $files[] = $image_block[$key];
                    }
                }
            }
            $images_block[] = $image_block;
        }
    }

    $files_size = 0;

    foreach ( $files as $image ) {
        $files_size += filesize($image);
    }

    function formatBytes($size, $precision = 2)
    {
        $base = log($size, 1024);
        $suffixes = array('', 'k', 'M', 'G', 'T');

        return round(pow(1024, $base - floor($base)), $precision) . $suffixes[floor($base)];
    }

    $bytes = ($files_size !== 0) ? formatBytes($files_size, 2) : 0;

    echo sprintf(esc_html__('The Adaptive Images system is using %1$s of the %2$s space left.', 'lerp'), $bytes, formatBytes(disk_free_space("."), 2));

    die();
}

/* AJAX call to load all images */
add_action('wp_ajax_list_images', 'lerp_list_images');

/**
 * delete all the AI images version when an attachment is erased
 */
function lerp_delete_uia_files($postId)
{
    global $wpdb;
    $filename = get_attached_file($postId);
    if ( $filename != '' ) {
        $extension_pos = strrpos($filename, '.');
        $filename_wildcard = substr($filename, 0, $extension_pos) . '*' . substr($filename, $extension_pos);
        $image_block = glob($filename_wildcard);
        foreach ( $image_block as $key => $image ) {
            if ( strpos($image_block[$key], '-uai-') !== false ) {
                unlink($image_block[$key]);
            }
        }
    }
}

add_action('delete_attachment', 'lerp_delete_uia_files');

/**
 * Override export menu
 */
function lerp_override_export_menu()
{
    add_submenu_page('tools.php', 'Export', 'Export', 'manage_options', 'lerp-export', 'export_submenu_page_callback');
    global $submenu;
    unset($submenu['tools.php'][15]);
}

add_action('admin_menu', 'lerp_override_export_menu');

function lerp_header_export_xml()
{
    global $pagenow;

    if ( 'tools.php' == $pagenow && isset($_GET['page']) && 'lerp-export' == $_GET['page'] && isset($_GET['download']) && 'true' == $_GET['download'] ) {

        $sitename = sanitize_key(get_bloginfo('name'));
        if ( !empty($sitename) ) $sitename .= '.';
        $filename = $sitename . 'wordpress.' . date('Y-m-d') . '.xml';

        header('Content-Description: File Transfer');
        header('Content-Disposition: attachment; filename=' . $filename);
        header('Content-Type: text/xml; charset=' . get_option('blog_charset'), true);

        if ( defined('UNCODE_EXPORT_TEMPLATE') )
            require_once(UNCODE_EXPORT_TEMPLATE);
        else
            require_once('export/lerp_export_template.php');

        if ( isset($_GET['download']) ) {
            $args = array();

            if ( !isset($_GET['content']) || 'all' == $_GET['content'] ) {
                $args['content'] = 'all';
            } else if ( 'posts' == $_GET['content'] ) {
                $args['content'] = 'post';

                if ( $_GET['cat'] )
                    $args['category'] = (int)$_GET['cat'];

                if ( $_GET['post_author'] )
                    $args['author'] = (int)$_GET['post_author'];

                if ( $_GET['post_start_date'] || $_GET['post_end_date'] ) {
                    $args['start_date'] = $_GET['post_start_date'];
                    $args['end_date'] = $_GET['post_end_date'];
                }

                if ( $_GET['post_status'] )
                    $args['status'] = $_GET['post_status'];
            } else if ( 'pages' == $_GET['content'] ) {
                $args['content'] = 'page';

                if ( $_GET['page_author'] )
                    $args['author'] = (int)$_GET['page_author'];

                if ( $_GET['page_start_date'] || $_GET['page_end_date'] ) {
                    $args['start_date'] = $_GET['page_start_date'];
                    $args['end_date'] = $_GET['page_end_date'];
                }

                if ( $_GET['page_status'] )
                    $args['status'] = $_GET['page_status'];
            } else {
                $args['content'] = $_GET['content'];
            }

            lerp_export_wp($args);

            die();
        }
    }
}

add_action('admin_init', 'lerp_header_export_xml');

/**
 * TinyMce add MARK buttn
 */
add_action('init', 'lerp_mark_button');
function lerp_mark_button()
{
    add_filter("mce_external_plugins", "lerp_mark_add_button");
    add_filter('mce_buttons', 'lerp_mark_register_button');
}

function lerp_mark_add_button($plugin_array)
{
    $plugin_array['lerpmarkbutton'] = $dir = get_template_directory_uri() . '/core/assets/js/tinymce.js';
    return $plugin_array;
}

function lerp_mark_register_button($buttons)
{
    array_push($buttons, 'markbutton');
    return $buttons;
}

if ( !function_exists('lerp_get_current_post_type') ) :
    /**
     * Get post type in any case.
     * @since Lerp 1.6.0
     */
    function lerp_get_current_post_type()
    {
        global $post, $typenow, $current_screen, $pagenow;
        if ( $post && $post->post_type ) {
            return $post->post_type;
        } elseif ( $typenow ) {
            return $typenow;
        } elseif ( $current_screen && $current_screen->post_type ) {
            return $current_screen->post_type;
        } elseif ( isset($_REQUEST['post_type']) ) {
            return sanitize_key($_REQUEST['post_type']);
        } elseif ( isset($_GET['post']) && $_GET['post'] != -1 ) {
            $thispost = get_post($_GET['post']);
            if ( $thispost )
                return $thispost->post_type;
            else
                return null;
        } else {
            if ( $pagenow === 'post-new.php' )
                return 'post';
            else
                return null;
        }
    }
endif;

// add_action('after_switch_theme', 'initial_walkthrough', 1);

// require_once get_template_directory() . '/core/inc/walkthrough_init.php';

add_action('after_switch_theme', 'lerp_add_default_image_with_activation');

function lerp_add_default_image_with_activation()
{
    $default_back_media = get_page_by_title('lerp-default-back', OBJECT, 'attachment');

    if ( !isset($default_back_media) ) {

        // gives us access to the download_url() and wp_handle_sideload() functions
        require_once(ABSPATH . 'wp-admin/includes/file.php');

        // URL to the WordPress logo
        $url = 'http://static.undsgn.com/lerp/dummy_placeholders/lerp-default-back.jpeg';
        $timeout_seconds = 5;

        // download file to temp dir
        $temp_file = download_url($url, $timeout_seconds);

        if ( !is_wp_error($temp_file) ) {

            // array based on $_FILE as seen in PHP file uploads
            $file = array(
                'name' => basename($url), // ex: wp-header-logo.png
                'type' => 'image/jpeg',
                'tmp_name' => $temp_file,
                'error' => 0,
                'size' => filesize($temp_file),
            );

            $overrides = array(
                // tells WordPress to not look for the POST form
                // fields that would normally be present, default is true,
                // we downloaded the file from a remote server, so there
                // will be no form fields
                'test_form' => false,

                // setting this to false lets WordPress allow empty files, not recommended
                'test_size' => true,

                // A properly uploaded file will pass this test.
                // There should be no reason to override this one.
                'test_upload' => true,
            );

            // move the temporary file into the uploads directory
            $results = wp_handle_sideload($file, $overrides);

            if ( !empty($results['error']) ) {
                // insert any error handling here
            } else {

                $filename = $results['file']; // full path to the file
                $local_url = $results['url']; // URL to the file in the uploads dir
                $type = $results['type']; // MIME type of the file

                // Check the type of file. We'll use this as the 'post_mime_type'.
                $filetype = wp_check_filetype(basename($filename), null);

                // Get the path to the upload directory.
                $wp_upload_dir = wp_upload_dir();

                // Prepare an array of post data for the attachment.
                $attachment = array(
                    'guid' => $wp_upload_dir['url'] . '/' . basename($filename),
                    'post_mime_type' => $type,
                    'post_title' => preg_replace('/\.[^.]+$/', '', basename($filename)),
                    'post_content' => '',
                    'post_status' => 'inherit'
                );

                // Insert the attachment.
                $attach_id = wp_insert_attachment($attachment, $filename);

                // Make sure that this file is included, as wp_generate_attachment_metadata() depends on it.
                require_once(ABSPATH . 'wp-admin/includes/image.php');

                // Generate the metadata for the attachment, and update the database record.
                $attach_data = wp_generate_attachment_metadata($attach_id, $filename);
                wp_update_attachment_metadata($attach_id, $attach_data);

                update_option('lerp_default_header_image', $attach_id);

            }

        }
    }
}

add_action('upgrader_process_complete', 'lerp_upgrader_process_complete', 10, 2);

function lerp_upgrader_process_complete($upgrader, $data)
{
    $result = $upgrader->result;
    if ( isset($result['destination_name']) && $result['destination_name'] === 'lerp' ) lerp_create_dynamic_css();
}

/**
 * Detect page_builder plugin. For use in Admin area only.
 */
if ( function_exists('is_plugin_active') ) {
    if ( is_plugin_active('page_builder/page_builder.php') ) {
        function lerp_page_builder_nag()


        {
            ?>
            <div class="notice error is-dismissible">
                <p><?php esc_attr_e('In order to run Lerp you need first to deactivate WPBakery Visual Composer and install the Lerp Visual Composer.', 'lerp'); ?></p>
                <p><a class="button button-primary button-hero deactivate-jscomposer" href="#"
                      aria-label="Deactivate WPBakery Visual Composer"><?php esc_attr_e('Deactivate WPBakery Visual Composer', 'lerp'); ?></a>
                </p>

            </div>
            <?php
        }

        add_action('admin_notices', 'lerp_page_builder_nag');
    }
}

$max_input_vars = ini_get('max_input_vars');
if ( $max_input_vars < 3000 ) {
    global $pagenow;
    if ( is_admin() && $pagenow === 'admin.php' && $_GET['page'] === 'lerp-options' ) {
        function lerp_php_max_vars_nag()
        {
            ?>
            <div class="notice error is-dismissible">
                <p>
                    <strong><?php esc_html_e('Warning: PHP max_input_vars', 'lerp'); ?></strong>
                </p>
                <p>
                    <?php echo sprintf(wp_kses(__('Before saving the theme options you need to address an issue marked on the <a href="%s">Welcome Screen</a>.', 'lerp'), array('a' => array('href' => array(), 'target' => array()))), admin_url('admin.php?page=lerp-system-status')); ?>
                </p>
            </div>
            <?php
        }

        add_action('admin_notices', 'lerp_php_max_vars_nag');
    }
}

function lerp_transparent_header_nag()
{
    if ( !is_admin() ) return false;
    if ( !isset($_GET['post']) ) return false;
    $lerp_post_types = lerp_get_post_types(true);
    $lerp_current_post_type = lerp_get_current_post_type();
    if ( in_array($lerp_current_post_type, $lerp_post_types) ) {
        $general_style = ot_get_option('_lerp_general_style');
        $stylemain = ot_get_option('_lerp_primary_menu_style');
        if ( $stylemain === '' ) $stylemain = $general_style;
        $transpmainheader = ot_get_option('_lerp_menu_bg_alpha_' . $stylemain);
        if ( $transpmainheader !== '100' ) {
            $post_id = $_GET['post'];
            $metabox_data = get_post_custom($post_id);
            $show_nag = false;
            $get_post_type = get_post_type($post_id);
            $get_generic_header = ot_get_option('_lerp_' . $get_post_type . '_header');
            if ( isset($metabox_data['_lerp_specific_menu_opaque'][0]) && $metabox_data['_lerp_specific_menu_opaque'][0] !== 'on' ) {
                if ( $get_generic_header === 'none' || $get_generic_header === '' ) {
                    $show_nag = true;
                    if ( !isset($metabox_data['_lerp_header_type']) || (isset($metabox_data['_lerp_header_type'][0]) && $metabox_data['_lerp_header_type'][0] === 'none') ) {
                        $show_nag = true;
                    } else {
                        $show_nag = false;
                    }
                }
                if ( $show_nag ) {
                    ?>
                    <div class="notice notice-success notice-warning is-dismissible">
                        <p><?php echo sprintf(wp_kses(__('The menu transparency will not be visible without a declared header <a class="page-options-header-section" href="%s">here</a>.', 'lerp'), array('a' => array('href' => array(), 'class' => array(), 'target' => array()))), '#_lerp_page_options'); ?></p>
                    </div>
                    <?php
                }
            }
        }
    }
}

add_action('admin_notices', 'lerp_transparent_header_nag');

function lerp_core_update_nag()
{
    if ( !is_admin() || !file_exists(WP_PLUGIN_DIR . '/lerp-core/lerp-core.php') ) return false;
    $lerp_core = get_plugin_data(WP_PLUGIN_DIR . '/lerp-core/lerp-core.php');
    if ( isset($GLOBALS['tgmpa']->plugins['lerp-core']['version']) && isset($lerp_core['Version']) ) {
        if ( version_compare($GLOBALS['tgmpa']->plugins['lerp-core']['version'], $lerp_core['Version'], '>') ) {
            ?>
            <div class="notice error is-dismissible">
                <p><?php echo esc_html__('You need to update the Lerp Core plugin.', 'lerp'); ?></p>
            </div>
            <?php
        }
    }
}

add_action('admin_notices', 'lerp_core_update_nag');

/**
 * Add admin bar Lerp support button
 */

function lerp_support_admin_bar_menu($wp_admin_bar)
{

    if ( !is_admin_bar_showing() || ot_get_option('_lerp_admin_help') === 'off' )
        return;

    $wp_admin_bar->add_node(array(
        'id' => 'lerp-help',
        'title' => esc_html__('Lerp 帮助中心', 'lerp'),
        'href' => 'https://support.undsgn.com/hc/',
        'meta' => array('class' => 'lerp-support', 'target' => '_blank')
    ));

}

add_action('admin_bar_menu', 'lerp_support_admin_bar_menu', 999);

/**
 * Deactivate page_builder/
 */

function deactivate_page_builder()
{
    deactivate_plugins(WP_PLUGIN_DIR . '/page_builder/page_builder.php');
    echo 1;
    die();
}

add_action('wp_ajax_deactivate_page_builder', 'deactivate_page_builder');
add_action('wp_ajax_nopriv_deactivate_page_builder', 'deactivate_page_builder');

if ( !function_exists('lerp_get_post_types') ) {
    function lerp_get_post_types($built_in = false)
    {
        $args = array(
            'public' => true,
            '_builtin' => false
        );
        $output = 'names'; // names or objects, note names is the default
        $operator = 'and'; // 'and' or 'or'
        $get_post_types = get_post_types($args, $output, $operator);
        $lerp_post_types = array();
        if ( ($key = array_search('lerpblock', $get_post_types)) !== false ) {
            unset($get_post_types[$key]);
        }
        if ( ($key = array_search('lerp_gallery', $get_post_types)) !== false ) {
            unset($get_post_types[$key]);
        }
        if ( $built_in ) $lerp_post_types[] = 'post';
        if ( $built_in ) $lerp_post_types[] = 'page';
        foreach ( $get_post_types as $key => $value ) {
            $lerp_post_types[] = $key;
        }

        $lerp_post_types[] = 'author';

        return $lerp_post_types;
    }
}


/**
 * Convert HEX color to RGB
 */

function lerp_hex2rgb($hex)
{
    $hex = str_replace("#", "", $hex);

    if ( strlen($hex) == 3 ) {
        $r = hexdec(substr($hex, 0, 1) . substr($hex, 0, 1));
        $g = hexdec(substr($hex, 1, 1) . substr($hex, 1, 1));
        $b = hexdec(substr($hex, 2, 1) . substr($hex, 2, 1));
    } else {
        $r = hexdec(substr($hex, 0, 2));
        $g = hexdec(substr($hex, 2, 2));
        $b = hexdec(substr($hex, 4, 2));
    }
    $rgb = array(
        $r,
        $g,
        $b
    );

    return $rgb;
    // returns an array with the rgb values

}

add_filter('user_contactmethods', 'lerp_additional_contactmethods', 10, 1);
if ( !function_exists('lerp_additional_contactmethods') ) :
    /**
     * User profile socials.
     * @since Lerp 1.5.0
     */
    function lerp_additional_contactmethods($contactmethods)
    {
        // Add Facebook.
        $contactmethods['facebook'] = esc_html__('Facebook profile URL', 'lerp');
        // Add Twitter.
        $contactmethods['twitter'] = esc_html__('Twitter username or profile URL', 'lerp');
        // Add Google+.
        $contactmethods['googleplus'] = esc_html__('Google+', 'lerp');
        // Add Dribbble.
        $contactmethods['dribbble'] = esc_html__('Dribbble profile URL', 'lerp');
        // Add Instagram.
        $contactmethods['instagram'] = esc_html__('Instagram profile URL', 'lerp');
        // Add Pinterest.
        $contactmethods['pinterest'] = esc_html__('Pinterest page URL', 'lerp');
        // Add Xing.
        $contactmethods['xing'] = esc_html__('Xing profile URL', 'lerp');
        // Add YouTube.
        $contactmethods['youtube'] = esc_html__('YouTube page URL', 'lerp');
        // Add Vimeo.
        $contactmethods['vimeo'] = esc_html__('Vimeo page URL', 'lerp');
        // Add Tumblr.
        $contactmethods['tumblr'] = esc_html__('Tumblr page URL', 'lerp');

        return $contactmethods;
    }
endif; //lerp_additional_contactmethods

add_action('show_user_profile', 'lerp_user_add_meta_featured_image');
add_action('edit_user_profile', 'lerp_user_add_meta_featured_image');
if ( !function_exists('lerp_user_add_meta_featured_image') ) :
    /**
     * Edit user featured media.
     * @since Lerp 1.5.0
     */
    function lerp_user_add_meta_featured_image($user)
    {
        /* create localized JS array */
        $localized_array = array(
            'upload_text' => apply_filters('ot_upload_text', esc_html__('Send to OptionTree', 'option-tree')),
            'remove_media_text' => esc_html__('Remove Media', 'option-tree'),
        );
        /* localized script attached to 'option_tree' */
        wp_localize_script('admin_lerp_js', 'option_tree', $localized_array);
        wp_enqueue_media();
        $user_lerp_meta = get_the_author_meta('user_lerp_meta', $user->ID);
        ?>
        <table class="form-table">
            <tr id="user-featured-image" class="user-featured-image-wrap">
                <th>
                    <label for="user_lerp_meta[term_media]"><?php esc_html_e('Featured media', 'lerp'); ?></label>
                </th>
                <td>
                    <div class="format-setting-inner">
                        <div class="option-tree-ui-upload-parent">
                            <input type="text" name="user_lerp_meta[term_media]" id="term_media"
                                   value="<?php echo esc_attr(isset($user_lerp_meta['term_media']) ? $user_lerp_meta['term_media'] : ''); ?>"
                                   class="widefat option-tree-ui-upload-input " readonly="">
                            <a href="javascript:void(0);"
                               class="ot_upload_media option-tree-ui-button button button-primary light"
                               title="Add Media"><span
                                        class="icon fa fa-plus2"></span><?php esc_html_e('Add media', 'lerp'); ?></a>
                        </div>
                        <?php
                        if ( isset($user_lerp_meta['term_media']) && wp_attachment_is_image($user_lerp_meta['term_media']) ) {
                            $attachment_data = wp_get_attachment_image_src($user_lerp_meta['term_media'], 'original');
                            /* check for attachment data */
                            if ( $attachment_data ) {
                                $field_src = $attachment_data[0];
                            }
                            echo '<div class="option-tree-ui-media-wrap" id="term_media_media">';
                            /* replace image src */
                            if ( isset($field_src) )
                                $user_lerp_meta['term_media'] = $field_src;

                            $post = get_post($user_lerp_meta['term_media']);
                            if ( isset($post->post_mime_type) && $post->post_mime_type === 'oembed/svg' ) echo '<div class="option-tree-ui-image-wrap">' . $post->post_content . '</div>';
                            else if ( preg_match('/\.(?:jpe?g|png|gif|ico)$/i', $user_lerp_meta['term_media']) )
                                echo '<div class="option-tree-ui-image-wrap"><img src="' . esc_url($user_lerp_meta['term_media']) . '" alt="" /></div>';
                            else echo '<div class="option-tree-ui-image-wrap"><div class="option-tree-ui-image-wrap"><div class="oembed" onload="alert(\'load\');"><span class="spinner" style="display: block; float: left;"></span></div><div class="oembed_code" style="display: none;">' . esc_url($user_lerp_meta['term_media']) . '</div></div></div>';
                            echo '<a href="#" class="option-tree-ui-remove-media option-tree-ui-button button button-secondary light" title="' . esc_html__('Remove Media', 'lerp') . '"><span class="icon fa fa-minus2"></span>' . esc_html__('Remove Media', 'lerp') . '</a>';
                            echo '</div>';
                        }
                        ?>
                        <p class="description"><?php esc_html_e('Select a media assigned to the author page.', 'lerp'); ?></p>
                    </div>
                </td>
            </tr>
        </table>
        <script type="text/javascript">
            jQuery(document).ready(function ($) {
                $.fn.lerp_init_upload();
            });
        </script>
        <?php
    }
endif; //lerp_user_add_meta_featured_image

add_action('personal_options_update', 'lerp_user_save_meta_featured_image');
add_action('edit_user_profile_update', 'lerp_user_save_meta_featured_image');
if ( !function_exists('lerp_user_save_meta_featured_image') ) :
    /**
     * Save user featured media.
     * @since Lerp 1.5.0
     */
    function lerp_user_save_meta_featured_image($user_id)
    {

        if ( !current_user_can('edit_user', $user_id) )
            return false;

        if ( empty($_POST['user_lerp_meta']) )
            return false;

        update_user_meta($user_id, 'user_lerp_meta', $_POST['user_lerp_meta']);
    }
endif; //lerp_user_save_meta_featured_image

add_action('admin_init', 'lerp_check_for_previous_consistency');
if ( !function_exists('lerp_check_for_previous_consistency') ):
    /**
     * Check if author module exists from previous version, otherwise set default values.
     * Check a new version has installed.
     * @since Lerp 1.6.1
     */
    function lerp_check_for_previous_consistency()
    {
        if ( !get_option('lerp_check_for_author_module') ) {
            $options = get_option(ot_options_id());
            foreach ( $options as $option => $value ) {
                if ( strpos($option, '_lerp_post_index_') === 0 ) {
                    $new_option = str_replace('_post_index_', '_author_index_', $option);
                    $options[$new_option] = $value;
                }
            }
            update_option('lerp_check_for_author_module', true);
            update_option(ot_options_id(), $options);
        }
        if ( !get_option('lerp_latest_version') || version_compare(get_option('lerp_latest_version'), UNCODE_VERSION, '<') ) {
            update_option('lerp_latest_version', UNCODE_VERSION);
            do_action('lerp_upgraded');
        }
    }
endif;//lerp_check_for_previous_consistency

add_action('lerp_upgraded', 'lerp_create_dynamic_css');

add_action('custom_menu_order', 'lerp_change_menu_cap', 50);
if ( !function_exists('lerp_change_menu_cap') ):
    /**
     * @since Lerp 1.5.0
     */
    function lerp_change_menu_cap($menu_ord)
    {
        global $submenu;

        if ( !isset($submenu['lerp-system-status']) )
        {
            return $menu_ord;
        }

        foreach ( $submenu['lerp-system-status'] as $position => $menu ) {
            if ( isset($menu[2]) && $menu[2] == 'backups' ) {
                $backups = $menu;
                unset($submenu['lerp-system-status'][$position]);
            }
            if ( isset($menu[2]) && $menu[2] == 'communication' ) {
                $communication = $menu;
                unset($submenu['lerp-system-status'][$position]);
            }
            if ( isset($menu[2]) && $menu[2] == 'patches' ) {
                $patches = $menu;
                unset($submenu['lerp-system-status'][$position]);
            }
            if ( isset($menu[2]) && $menu[2] == 'updates' ) {
                $updates = $menu;
                unset($submenu['lerp-system-status'][$position]);
            }
            if ( isset($menu[2]) && $menu[2] == 'lerp-system-status' ) {
                $status = $menu;
                unset($submenu['lerp-system-status'][$position]);
            }
            if ( isset($menu[2]) && $menu[2] == 'lerp-import-demo' ) {
                $demo = $menu;
                unset($submenu['lerp-system-status'][$position]);
            }
            if ( isset($menu[2]) && $menu[2] == 'lerp-plugins' ) {
                $plugins = $menu;
                unset($submenu['lerp-system-status'][$position]);
            }
            if ( isset($menu[2]) && $menu[2] == 'lerp-options' ) {
                $options = $menu;
                unset($submenu['lerp-system-status'][$position]);
            }
            if ( isset($menu[2]) && $menu[2] == 'lerp-settings' ) {
                $settings = $menu;
                unset($submenu['lerp-system-status'][$position]);
            }
            if ( isset($menu[2]) && $menu[2] == 'lerp-font-library' ) {
                $fonts = $menu;
                unset($submenu['lerp-system-status'][$position]);
            }
            if ( isset($menu[2]) && $menu[2] == 'lerp-support' ) {
                $support = $menu;
                unset($submenu['lerp-system-status'][$position]);
            }
        }

        array_unshift($submenu['lerp-system-status'], $options);
        if ( ot_get_option('_lerp_admin_help') !== 'off' ) {
            array_unshift($submenu['lerp-system-status'], $support);
        }
        array_unshift($submenu['lerp-system-status'], $settings);
        array_unshift($submenu['lerp-system-status'], $fonts);
//        array_unshift($submenu['lerp-system-status'], $demo);
        array_unshift($submenu['lerp-system-status'], $plugins);
        array_unshift($submenu['lerp-system-status'], $status);

        $i = 0;
        foreach ( $submenu['lerp-system-status'] as $position => $menu ) {
            if ( isset($menu[2]) && $menu[2] == 'lerp-options' ) {
                $options_pos = $i;
            }
            $i++;
        }

        $array_first = array_slice($submenu['lerp-system-status'], 0, ($options_pos));
        $array_second = array_slice($submenu['lerp-system-status'], ($options_pos));

        if ( isset($backups) )
            $array_first[] = $backups;
        if ( isset($communication) )
            $array_first[] = $communication;
        if ( isset($patches) )
            $array_first[] = $patches;
        if ( isset($updates) )
            $array_first[] = $updates;

        $array_first = array_merge($array_first, $array_second);

        //$array_first_2 = array_slice($array_first, 0, ($settings + 1));
        //$array_second_2 = array_slice($array_first, ($settings + 1));

        /*if( isset($plugins) )
         $array_first_2[] = $plugins;

     $array_first_2 = array_merge($array_first_2, $array_second_2);*/

        $submenu['lerp-system-status'] = $array_first;

        return $menu_ord;
    }
endif;//lerp_change_menu_cap

add_action('admin_menu', 'lerp_related_post_submenu', 100);
if ( !function_exists('lerp_related_post_submenu') ):
    /**
     * @since Lerp 1.5.0
     */
    function lerp_related_post_submenu()
    {
        if ( is_plugin_active('related-posts-for-wp/related-posts-for-wp.php') && class_exists('RP4WP_Hook_Settings_Page') ) {
            require_once get_template_directory() . '/core/inc/related-posts/class-hook-settings-page.php';

            remove_submenu_page('options-general.php', 'rp4wp');

            add_submenu_page('lerp-system-status', 'UNCODE', esc_html__('Related Posts', 'related-posts-for-wp'), 'manage_options', 'rp4wp', array(
                'Lerp_RP4WP_Hook_Settings_Page',
                'screen'
            ), 'lerp-system-status', 'lerp_welcome_page');

        }
    }
endif;//lerp_related_post_submenu

add_action('admin_menu', 'lerp_VC_submenu_pages', 100);
if ( !function_exists('lerp_VC_submenu_pages') ):
    /**
     * @since Lerp 1.5.0
     */
    function lerp_VC_submenu_pages()
    {
        remove_submenu_page('vc-general', 'edit.php?post_type=vc_grid_item');
    }
endif;//lerp_VC_submenu_pages

add_action('init', 'lerp_VC_deregister_cpt', 100);
if ( !function_exists('lerp_VC_deregister_cpt') ):
    /**
     * @since Lerp 1.5.0
     */
    function lerp_VC_deregister_cpt()
    {
        if ( function_exists('unregister_post_type') )//WP 4.5+
            unregister_post_type('vc_grid_item');
    }
endif;//lerp_VC_deregister_cpt

add_action('wp_ajax_lerp_vc_admin_notice_dismiss', 'lerp_vc_admin_notice_dismiss');
if ( !function_exists('lerp_vc_admin_notice_dismiss') ) :
    /**
     * @since Lerp 1.5.0
     */
    function lerp_vc_admin_notice_dismiss()
    {

        update_option('lerp_vc_admin_notice', true);

        die();
    }
endif; //mood_dismiss_notice_updates

add_action('admin_notices', 'lerp_vc_admin_notice');
if ( !function_exists('lerp_vc_admin_notice') ) :
    /**
     * @since Lerp 1.5.0
     */
    function lerp_vc_admin_notice()
    {

        if ( !function_exists('vc_editor_post_types') )
            return;

        $post_type = lerp_get_current_post_type();
        $vc_post_type = vc_editor_post_types();

        if ( in_array($post_type, $vc_post_type) )
            return;

        if ( !get_option('lerp_vc_admin_notice') && $post_type == 'lerpblock' ) {
            ?>
            <div class="notice error is-dismissible" id="lerp_vc_admin_notice">
                <p><?php printf(wp_kses_post(__('Please activate page builder for Content Block in Visual Composer <a href="%1s">Role Manager</a>. More info on the documentation, <a href="%2s" target="_blank">click here</a>', 'lerp')), esc_url(admin_url('admin.php?page=vc-roles')), esc_url('https://support.undsgn.com/hc/en-us/articles/214006125')); ?></p>
            </div>
            <?php
        }

    }
endif; //lerp_admin_notices

add_action('wp_ajax_lerp_test_vars', 'lerp_test_vars');
if ( !function_exists('lerp_test_vars') ) :
    /**
     * @since Lerp 1.6.4
     */
    function lerp_test_vars()
    {
        echo count($_POST['content']);
        die();
    }
endif; //lerp_test_vars

add_action('wp_ajax_lerp_update_max_input_vars', 'lerp_update_max_input_vars');
if ( !function_exists('lerp_update_max_input_vars') ) :
    /**
     * @since Lerp 1.7.0
     */
    function lerp_update_max_input_vars()
    {
        update_option('lerp_test_max_input_vars', $_POST['content']);
        die();
    }
endif; //lerp_update_max_input_vars
