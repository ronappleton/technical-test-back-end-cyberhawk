import { Navigate, Outlet } from 'react-router-dom';
import useLocalStorage from '../hooks/services/useLocalStorage';

function ProtectedRoute({ children }) {
  const { getToken } = useLocalStorage();
  const token = getToken();

  if (!token) {
    return <Navigate to="/login" />;
  }

  return children || <Outlet />;
}

export default ProtectedRoute;
