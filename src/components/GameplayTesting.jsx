javascript
import React from 'react';
import { render, fireEvent } from '@testing-library/react';
import GameplayTesting from './gameplay-testing';

describe('Gameplay Testing', () => {
  let gameplay;

  beforeEach(() => {
    gameplay = render(<GameplayTesting />);
  });

  afterEach(() => {
    // Reset the game state
    gameplay.rerender();
  });

  it('should be engaging and fun', () => {
    const button = gameplay.getByRole('button');
    fireEvent.click(button);
    expect(button).toHaveTextContent('Click me!');
  });
});