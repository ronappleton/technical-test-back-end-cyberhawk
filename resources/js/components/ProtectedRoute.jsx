import { Navigate, Outlet } from 'react-router-dom';
import useTokenService from '../hooks/services/useTokenService';

function ProtectedRoute({ children }) {
  const { retrieveToken } = useTokenService();
  const token = retrieveToken();

  if (!token) {
    return <Navigate to="/login" />;
  }

  return children || <Outlet />;
}

export default ProtectedRoute;
