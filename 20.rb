require "jcode"

total = 1
(1..100).each do |x|
  total *= x
end
print total
print "\n"
result = 0
total.to_s.each_char do |x|
  result += x.to_i
end
print result