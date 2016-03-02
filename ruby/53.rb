def factorial(n)
  sum = 1
  (1..n).each do |x|
    sum *= x
  end
  sum
end

howMany = 0
#n
(1..100).each do |n|
  (0..n).each do |r|
    cnr = factorial(n) / (factorial(r)*factorial(n-r))
    # puts cnr
    if cnr > 1000000
      howMany += 1
    end
  end
end

puts howMany