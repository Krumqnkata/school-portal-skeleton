# Repository Guidelines

## Project Structure & Modules
- `src/` holds all app code: `components/` for reusable UI (shadcn/Radix, Tailwind), `pages/` for route screens, `hooks/` and `lib/` for shared logic, `App.tsx` wires routing, `main.tsx` bootstraps React.
- Styling lives in `src/index.css` and `src/App.css`; Tailwind config is in `tailwind.config.ts` with typography plugin. Assets served from `public/`.
- Use the path alias `@/` (see `tsconfig.json`) for imports instead of long relative paths.

## Build, Test, and Development Commands
- Install: `npm install` (lockfiles for npm are present).
- Local dev: `npm run dev` (Vite dev server with React Fast Refresh).
- Build: `npm run build` (production bundle), `npm run build:dev` (development-mode bundle for debugging).
- Preview: `npm run preview` (serves the built app locally).
- Lint: `npm run lint` (ESLint for TS/React/Tailwind classnames).

## Coding Style & Naming Conventions
- Language: TypeScript + React; prefer function components and hooks.
- Imports: absolute with `@/…` when crossing folders; group framework, third-party, then local.
- Components and hooks in PascalCase; utilities and variables in camelCase; files in `kebab-case` or `PascalCase` to match exports.
- Indentation: 2 spaces; keep lines focused and avoid unused exports (TS config relaxes unused checks—clean them up manually).
- Use Tailwind utility-first styling; keep variant logic in component helpers (see `src/components` patterns).

## Testing Guidelines
- No automated tests are present yet; add tests alongside features when possible.
- Suggested stack: Vitest + React Testing Library to validate UI behavior; mock network calls and assert rendered states.
- Name tests after the behavior (`FeatureName.spec.tsx`) and colocate near the code or under `src/__tests__/`.

## Commit & Pull Request Guidelines
- Recent history shows short, imperative summaries (e.g., “Add hover scale on news/cards”). Keep subject lines under ~50 chars and focus on intent, not implementation.
- For PRs, include: what changed, why, and how to verify. Link related issues; attach UI screenshots or clips for visual changes; note any follow-ups or known gaps.
- Run `npm run lint` and, if added, tests before opening a PR; mention any failing checks with rationale.
