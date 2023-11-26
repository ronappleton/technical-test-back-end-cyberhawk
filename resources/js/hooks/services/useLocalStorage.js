import axios from 'axios';

const useLocalStorage = () => {
  const storeToken = (token) => {
    localStorage.setItem('token', token);
    axios.defaults.headers.common.Authorization = `Bearer ${token}`;
  };

  const storePermissions = (permissions) => {
    localStorage.setItem('permissions', permissions);
  };

  const getToken = () => localStorage.getItem('token');

  const getPermissions = () => {
    const permissions = localStorage.getItem('permissions');

    return permissions ? permissions.split(',') : null;
  };

  const removeToken = () => {
    localStorage.removeItem('token');
    axios.defaults.headers.common.Authorization = null;
  };

  const removePermissions = () => {
    localStorage.removeItem('permissions');
  };

  return {
    storeToken, storePermissions, getToken, getPermissions, removeToken, removePermissions,
  };
};

export default useLocalStorage;
