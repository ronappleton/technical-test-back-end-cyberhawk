import App from './components/App'
import { createRoot } from 'react-dom/client';
import axios from "axios";

const container = document.getElementById('app');
const root = createRoot(container);

root.render(<App />);
