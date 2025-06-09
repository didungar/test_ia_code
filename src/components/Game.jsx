import React from 'react';
import { render, fireEvent } from '@testing-library/react';
import Game from './Game';

describe('Game', () => {
  let game;

  beforeEach(() => {
    game = render(<Game />);
  });

  it('should initialize the game correctly', () => {
    expect(game.container.querySelectorAll('.tile')).toHaveLength(20);
    expect(game.container.querySelector('.player-name').textContent).toBe('');
    expect(game.container.querySelector('.score').textContent).toBe('0');
  });

  it('should handle player input correctly', () => {
    const input = game.container.querySelector('.player-name');
    fireEvent.change(input, { target: { value: 'John Doe' } });
    expect(game.container.querySelector('.player-name').textContent).toBe('John Doe');
  });
});