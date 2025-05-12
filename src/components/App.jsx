import React from 'react';
import { render } from '@testing-library/react';
import { act } from 'react-dom/test-utils';
import App from './App';

describe('Tests unitaires des erreurs', () => {
  it('doit afficher une erreur si l\'utilisateur n\'a pas de nom', async () => {
    const { getByTestId } = render(<App />);
    const inputName = getByTestId('name-input');
    expect(inputName).toHaveValue('');
    await act(() => {
      inputName.dispatchEvent(new Event('keydown', { key: 'Enter' }));
    });
    const errorMessage = getByTestId('error-message');
    expect(errorMessage).toHaveTextContent('Veuillez entrer votre nom');
  });

  it('doit afficher une erreur si l\'utilisateur n\'a pas de prénom', async () => {
    const { getByTestId } = render(<App />);
    const inputName = getByTestId('name-input');
    expect(inputName).toHaveValue('John Doe');
    await act(() => {
      inputName.dispatchEvent(new Event('keydown', { key: 'Enter' }));
    });
    const errorMessage = getByTestId('error-message');
    expect(errorMessage).toHaveTextContent('Veuillez entrer votre prénom');
  });
});